<?php

namespace Divae\TagsFilter\Domain\Model;


/**
 * Class Advantage
 * @package Divae\TagsFilter\Domain\Model
 */
class Advantage extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $description;
    /**
     * pics
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $pics = null;

    public function __construct()
    {
        $this->pics = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getPics()
    {
        return $this->pics;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $pics
     */
    public function setPics($pics)
    {
        $this->pics = $pics;
    }


}