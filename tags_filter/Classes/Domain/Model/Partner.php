<?php

namespace Divae\TagsFilter\Domain\Model;


/**
 * Class Partner
 * @package Divae\TagsFilter\Domain\Model
 */
class Partner extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $title;
    /**
     * pics
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $pics = null;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\Tag>
     */
    protected $tags = null;

    /**
     * Partner constructor.
     */
    public function __construct()
    {
        $this->pics = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }


}