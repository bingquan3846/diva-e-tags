<?php

namespace Divae\TagsFilter\Command;

use Divae\DivaeLocationManager\Domain\Model\Job;
use Divae\DivaeLocationManager\Domain\Repository\JobRepository;
use Divae\DivaeLocationManager\Domain\Repository\LocationRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class JobsImportCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController
{
    /**
     * @var string
     */
    private $multiValueDelimiter = "|";

    /**
     * @var \Divae\DivaeLocationManager\Domain\Repository\JobRepository
     * @inject
     */
    protected $jobRepository = null;
    /**
     * @var \Divae\DivaeLocationManager\Domain\Repository\LocationRepository
     */
    protected $locationRepository = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager = null;

    /**
     * @return bool|void
     */
    public function ImportJobsCommand(){
        $this->jobRepository = $this->objectManager->get(JobRepository::class);
        $this->locationRepository = $this->objectManager->get(LocationRepository::class);
        $this->persistenceManager = $this->objectManager->get(PersistenceManager::class);
        $url = "https://recruitingapp-5286.de.umantis.com/XMLExport/129?Key=yourkey&CustomerID=5286";

        try{
            $jobsfromXmlFile = simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);

        }catch(\TYPO3\CMS\Core\Log\Exception $e){
            die('Could not fetch xml:' . $e->getMessage());
            return false;
        }


        if(empty($jobsfromXmlFile)){
            return;
        }else{
            $this->hideAll();
        }

        $locations = $this->locationRepository->findAll()->toArray();
        foreach($locations as $location) {
            $location->setJobsnumber(0);
        }

        foreach( $jobsfromXmlFile->Job  as $job)
        {
            $json_string = json_encode($job);
            $result_array = json_decode($json_string, TRUE);
            $this->insertOrUpdateJob($result_array, $locations);
        }

        $this->persistenceManager->persistAll();


    }


    /**
     * @param $job
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    public function insertOrUpdateJob($job, $locations){

        if(!empty($job['arbeitsort'])){
            $cities = explode($this->multiValueDelimiter, $job['arbeitsort']);
        }else{
            $cities = [];
        }


        $jobId = $job['stellennummer'];
        /**@var \Divae\DivaeLocationManager\Domain\Model\Job $object */
        $exist = $this->jobRepository->fetchByJobId( $jobId );
        if(!$exist){
            $object = new Job();
        }else{
            $object = $exist[0];
        }

        $object->setPid(50);
        $object->setHidden(0);
        $object->setJobNumber($job['stellennummer']);
        $object->setTitle($job['titel']);
        $object->setType($job['art']);
        $object->setContactHeadline($job['überschriftansprechpartner']);
        $object->setContactText($job['ansprechpartner']);
        $object->setDepartment($job['unternehmensbereich']);
        $object->setPosition($job['position']);
        $object->setDuration($job['befristung']);
        $object->setTaskHeadline($job['überschriftaufgaben']);
        $object->setTaskText($job['aufgaben']);
        $object->setEmployerHeadline($job['überschriftarbeitgeber']);
        $object->setEmployerText($job['arbeitgeber']);
        $object->setWorkplaceHeadline($job['überschriftarbeitsplatz']);
        $object->setWorkplaceText($job['arbeitsplatz']);
        $object->setRequirementHeadline($job['überschriftanforderungen']);
        $object->setRequirementText($job['anforderungen']);
        $object->setProcessHeadline($job['überschriftbewerungsprozess']);
        $object->setProcessText($job['bewerbungsprozess']);
        $object->setFormLink($job['applylink']);
        $date = new \DateTime();
        $year = substr($job['onlineseit'], 0 , 4);
        $month = substr($job['onlineseit'], 4, 2);
        $day = substr($job['onlineseit'], 6, 2);
        $date->setDate($year, $month, $day );
        $object->setPublicationDate($date);

        foreach($locations as $location){

            if(!empty($cities)){
                foreach($cities as $city){
                    if( ($city == 'Frankfurt a. M.') && ($location->getCity() == 'Frankfurt am Main') ){
                        $object->addLocation($location);
                        $location->setJobsnumber($location->getJobsnumber() + 1 );
                        $this->persistenceManager->update($location);
                        break;
                    }

                    $pos = strpos($city, $location->getCity());
                    if(!($pos === false)){
                        $object->addLocation($location);
                        $location->setJobsnumber($location->getJobsnumber() + 1 );
                        $this->persistenceManager->update($location);
                        break;
                    }
                }
            }else{
                $other = strpos($job['arbeitsplatz'], $location->getCity());
                if(!($other === false)){
                    $object->addLocation($location);
                    $location->setJobsnumber($location->getJobsnumber() + 1 );
                    $this->persistenceManager->update($location);
                }
            }

        }

        if(!$exist){
            $this->persistenceManager->add($object);
        }else{
            $this->persistenceManager->update($object);
        }

    }

    /**
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    public function hideAll(){
        $jobs = $this->jobRepository->findAll();
        foreach($jobs as $job){

            $job->setHidden(1);


            $this->persistenceManager->update($job);
        }
        $this->persistenceManager->persistAll();

    }

    /**
     * set foreign_sort by publicate date of job
     */
    public function setSorting()
    {

        $relations = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tx_divaelocationmanager_job_location_mm');
    }

}