<?php

namespace Divae\TagsFilter\Domain\Repository;


class EventUserRepository extends AbstractRepository
{

    public function findByEmailEvent($email, $event){

        $query = $this->createQuery();

        $query->matching( $query->logicalAnd( array($query->equals('email', $email), $query->equals('news', $event)) ));

        return $query->execute();
    }
}