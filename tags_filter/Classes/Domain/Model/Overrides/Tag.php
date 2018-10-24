<?php

namespace Divae\TagsFilter\Domain\Model;


class Tag extends \GeorgRinger\News\Domain\Model\Tag
{

    /**
     * @var string
     */
    protected $link;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Service>
     */
    protected $service;

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function __construct()
    {
        $this->service = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $service
     */
    public function setServices($service)
    {
        $this->service = $service;
    }




}