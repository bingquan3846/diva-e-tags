<?php
namespace Divae\DivaeLocationManager\Domain\Repository;
use Divae\TagsFilter\Domain\Repository\AbstractRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

/**
 * Class LocationRepository
 * @package divae_location_manager
 *
 */
class JobRepository extends AbstractRepository
{
    public function initializeObject()
    {
        parent::initializeObject();
        $this->setDefaultOrderings(['publicationDate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);

    }

    public function fetchByJobId($jobNumber)
    {
        $querySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $querySettings->setIgnoreEnableFields(true);
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);

        $query = $this->createQuery();
        $query->matching($query->equals('jobNumber', $jobNumber));

        return $query->execute()->toArray();
    }

    public function doSearch($arguments, $pagination)
    {
        $query = $this->createQuery();
        $constraints = [];
        $wordConstraints = [];
        if(!empty($arguments['word'])){
            $word = "%" . $arguments['word'] . "%";
            $wordConstraints[] = $query->like('title', $word );
            $wordConstraints[] = $query->like('taskText', $word );
            $wordConstraints[] = $query->like('employerText', $word );
            $wordConstraints[] = $query->like('workplaceText', $word );
            $wordConstraints[] = $query->like('requirementText', $word );
            $wordConstraints[] = $query->like('processText', $word );
            $wordConstraints[] = $query->like('contactText', $word );

            $constraints[] = $query->logicalOr($wordConstraints);
        }

        if(!empty($arguments['city'])){
            $city =  $this->objectManager->get(LocationRepository::class)->findOneByUid($arguments['city']);
            $constraints[] = $query->contains('locations', $city);
        }

        if(!empty($arguments['position'])){
            $constraints[] = $query->like('position', "%" . $arguments['position'] . "%");
        }

        if(!empty($arguments['department'])){
            $constraints[] = $query->like('department', "%" . $arguments['department'] . "%");
        }

        if(!empty($constraints)){
            $jobsCount = $query->matching($query->logicalAnd($constraints))->count();
        }else{
            $jobsCount = $query->count();
        }


        $page = $pagination['page'] ;
        if(!empty($constraints)){
            $jobs = $query->matching($query->logicalAnd($constraints))->setOffset( ($page-1) * $pagination['itemPerPage'] )->setLimit($pagination['itemPerPage'])->execute()->toArray();
        }else{
            $jobs = $query->setOffset( ($page-1) * 10 )->setLimit(10)->execute()->toArray();
        }

        return [$jobsCount, $jobs];
    }
}
?>