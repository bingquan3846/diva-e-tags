<?php


namespace Divae\TagsFilter\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class ServiceRepository extends AbstractRepository
{

    public function findByCategories(ObjectStorage $categories, $excludeUid = '')
    {
        $query = $this->createQuery();

        if(!empty($categories)){
            foreach($categories as $category){
                $constrains[] = $query->contains('categories', $category);
            }
        }

        if(!empty($excludeUid)){
            $query->matching($query->logicalAnd(array($query->logicalOr($constrains), $query->logicalNot($query->equals('uid', $excludeUid)))));
        }else{
            $query->matching($query->logicalOr($constrains));
        }

        $result = $query->execute();

        return $result;
    }

}