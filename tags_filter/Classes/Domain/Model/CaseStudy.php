<?php

namespace Divae\TagsFilter\Domain\Model;


/**
 * Class CaseStudy
 * @package Divae\TagsFilter\Domain\Model
 */
/**
 * Class CaseStudy
 * @package Divae\TagsFilter\Domain\Model
 */
class CaseStudy extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $teaser;
    /**
     * @var string
     */
    protected $statistic;
    /**
     * @var string
     */
    protected $codes;
    /**
     * @var string
     */
    protected $platforms;
    /**
     * @var string
     */
    protected $persons;
    /**
     * @var string
     */
    protected $duration;
    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $pics;
    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $logo;
    /**
     * @var int
     */
    protected $page;
    /**
     * @var string
     */
    protected $sorting;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Tag>
     */
    protected $tags;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $categories;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\FrontendUser>
     */
    protected $speaker;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $video;
    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $videopreview;

    /**
     * CaseStudy constructor.
     */
    public function __construct()
    {
        $this->tags = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->speaker = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return sting
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * @param sting $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * @return string
     */
    public function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @param string $statistic
     */
    public function setStatistic($statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * @return string
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * @param string $codes
     */
    public function setCodes($codes)
    {
        $this->codes = $codes;
    }

    /**
     * @return string
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param string $platforms
     */
    public function setPlatforms($platforms)
    {
        $this->platforms = $platforms;
    }

    /**
     * @return string
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @param string $persons
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getPics()
    {
        return $this->pics;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pics
     */
    public function setPics($pics)
    {
        $this->pics = $pics;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }


    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param string $sorting
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
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

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }


    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $speaker
     */
    public function setSpeaker($speaker)
    {
        $this->speaker = $speaker;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getVideopreview()
    {
        return $this->videopreview;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $videopreview
     */
    public function setVideopreview($videopreview)
    {
        $this->videopreview = $videopreview;
    }


}