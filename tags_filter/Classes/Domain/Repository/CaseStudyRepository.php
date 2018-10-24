<?php

namespace Divae\TagsFilter\Domain\Repository;


/**
 * Class CaseStudyRepository
 * @package Divae\TagsFilter\Domain\Repository
 */
class CaseStudyRepository extends AbstractRepository
{


    /**
     * @param $sorting
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findNeighbor($sorting, $pre = true)
    {
        $query = $this->createQuery();

        $constains = [];
        if($pre){
            $constains[] = $query->lessThan('sorting', $sorting);
        }else{
            $constains[] = $query->greaterThan('sorting', $sorting);
        }

        $query->matching($query->logicalAnd($constains))->setLimit(1);

        return $query->execute();

    }

    public function findAllCaseStudies()
    {
        $query = $this->createQuery();
        $query->matching($query->equals('homepage', 1));
        $caseStudies = $query->execute()->toArray();

        return $caseStudies;
    }
}