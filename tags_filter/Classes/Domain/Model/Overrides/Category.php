<?php

namespace Divae\TagsFilter\Domain\Model;


/**
 * Class Category
 * @package Divae\TagsFilter\Domain\Model
 */
class Category extends \GeorgRinger\News\Domain\Model\Category
{

    /**
     * @var string
     */
    protected $uid;

    /**
     * @var  \TYPO3\CMS\Core\Category\Collection\CategoryCollection
     */
    protected $services;
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return null
     */
    public function getServices()
    {
        $this->services = new \TYPO3\CMS\Core\Category\Collection\CategoryCollection('tx_tagsfilter_domain_model_service');
        $this->services->setIdentifier($this->getUid());
        $this->services->loadContents();
        return $this->services;
    }

    /**
     * @param null $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }






}