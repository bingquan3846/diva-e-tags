<?php

namespace Divae\TagsFilter\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class ReferenceRepository extends AbstractRepository
{

    public function getAll()
    {
        $query = $this->createQuery();


        return $query->execute();
    }

}