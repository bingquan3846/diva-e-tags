<?php


namespace Divae\TagsFilter\Domain\Model;


/**
 * Class Service
 * @package Divae\TagsFilter\Domain\Model
 */
class Service extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\Category>
     */
    protected $categories = NULL;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Tag>
     */
    protected $tags = NULL;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\FrontendUser>
     */
    protected $colleges = NULL;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Content>
     */
    protected $contents = NULL;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Advantage>
     */
    protected $advantages = NULL;

    /**
     * @var string
     */
    protected $teaser;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $shortdescription;
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $keywords;
    /**
     * @var string
     */
    protected $ordering;

    /**
     * pics
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $pics = null;

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $this->categories = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->colleges = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->contents = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->advantanges = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return string
     */
    public function getTeaser()
    {

        $teaser =  preg_split( '/\r\n|\r|\n/', $this->teaser );
        return $teaser;
    }

    /**
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * @return string
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }

    /**
     * @param string $shortdescription
     */
    public function setShortdescription($shortdescription)
    {
        $this->shortdescription = $shortdescription;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getColleges()
    {
        return $this->colleges;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $colleges
     */
    public function setColleges($colleges)
    {
        $this->colleges = $colleges;
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
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getAdvantages()
    {
        return $this->advantages;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $advantages
     */
    public function setAdvantanges($advantages)
    {
        $this->advantanges = $advantages;
    }

    /**
     * @return string
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * @param string $ordering
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
    }




}