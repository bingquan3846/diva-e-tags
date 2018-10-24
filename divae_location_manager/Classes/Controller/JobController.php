<?php
namespace Divae\DivaeLocationManager\Controller;

/***
 *
 * This file is part of the "Location Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * JobController
 * @package divae_location_manager
 */
class JobController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * jobRepository
     *
     * @var \Divae\DivaeLocationManager\Domain\Repository\JobRepository
     * @inject
     */
    protected $jobRepository;
    /**
     * locationRepository
     *
     * @var \Divae\DivaeLocationManager\Domain\Repository\LocationRepository
     * @inject
     */
    protected $locationRepository;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $jobs = $this->jobRepository->findAll();
        $this->view->assign('jobs', $jobs);
    }

    /**
     * action show
     * 
     * @param \Divae\DivaeLocationManager\Domain\Model\Job $job
     * @return void
     */
    public function showAction(\Divae\DivaeLocationManager\Domain\Model\Job $job)
    {
        $this->view->assign('job', $job);
    }

    /**
     *
     */
    public function countAction()
    {
        $jobs = $this->jobRepository->findAll();
        $this->view->assign('jobs', $jobs);
    }

    /**
     *
     */
    public function searchAction()
    {
        $pagination = [
            'page' => 1,
            'itemPerPage' => 10
        ];

        $arguments = $this->request->getArguments();

        if(!empty($arguments['page'])){
            $pagination['page'] = $arguments['page'];
        }


        $this->locationRepository->setDefaultOrderings(['city' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        $locations = $this->locationRepository->findAll();
        $departments = $this->getDepartment();

        $jobsArray = $this->jobRepository->doSearch($arguments, $pagination);

        $this->view->assign('locations', $locations);
        $this->view->assign('departments', $departments);
        $this->view->assign('arguments', $arguments);
        $this->view->assign('jobs', $jobsArray[1]);
        $this->view->assign('jobsCount', $jobsArray[0]);

        $pagination['start'] = ($pagination['page'] - 1) * $pagination['itemPerPage'] + 1;
        $pagination['end'] = ($pagination['page'] - 1) * $pagination['itemPerPage'] + count($jobsArray[1]) ;
        if($pagination['end'] < $jobsArray[0]){
            $pagination['nextPage'] = $pagination['page'] + 1;
        }else{
            $pagination['nextPage'] = $pagination['page'];
        }

        if($pagination['start'] > 10){
            $pagination['previousPage'] = $pagination['page'] - 1;
        }else{
            $pagination['previousPage'] = $pagination['page'];
        }

        $pagination['totalPage'] = ceil($jobsArray[0]/$pagination['itemPerPage']);

        $this->view->assign('pagination', $pagination);

    }

    public function getDepartment(){

        $departments = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('distinct(department)', 'tx_divaelocationmanager_domain_model_job', 'hidden = 0 and deleted = 0 and department != "" ', '', 'department asc');

        return $departments;
    }


}
