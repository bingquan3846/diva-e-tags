<?php

namespace Divae\TagsFilter\Domain\Model;


/**
 * Class Content
 * @package Divae\TagsFilter\Domain\Model
 */
class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected $uid;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }


}