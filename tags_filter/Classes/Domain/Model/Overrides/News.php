<?php

namespace Divae\TagsFilter\Domain\Model;


use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class News extends \GeorgRinger\News\Domain\Model\News
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\FrontendUser>
     */
    protected $college = NUll;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Tag>
     * @lazy
     */
    protected $tags;

    /**
     * @var string
     */
    protected $city = NULL;

    /**
     * @var string
     */
    protected $speaker = '';
    /**
     * @var string
     */
    protected $eventtype = '';
    /**
     * @var string
     */
    protected $eventdate = '';
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $speakerimage = '';
    /**
     * @var string
     */
    protected $place = '';
    /**
     * @var string
     */
    protected $period = '';
    /**
     * @var string
     */
    protected $email = '';
    /**
     * @var string
     */
    protected $price = '';
    /**
     * @var string
     */
    protected $eventlanguage = '';

    /**
     * News constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->college = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->speakerimage = new  \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @param \Divae\TagsFilter\Domain\Model\FrontendUser $college
     */
    public function addCollege(\Divae\TagsFilter\Domain\Model\FrontendUser $college)
    {
        $this->college->attach($college);

    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $college
     */
    public function removeCollege(\Divae\TagsFilter\Domain\Model\FrontendUser $college)
    {
        $this->college->dettach($college);
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCollege()
    {
        return $this->college;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $college
     */
    public function setCollege($college)
    {
        $this->college = $college;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * @return string
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * @param string $speaker
     */
    public function setSpeaker($speaker)
    {
        $this->speaker = $speaker;
    }

    /**
     * @return string
     */
    public function getEventtype()
    {
        return $this->eventtype;
    }

    /**
     * @param string $eventtype
     */
    public function setEventtype($eventtype)
    {
        $this->eventtype = $eventtype;
    }

    /**
     * @return string
     */
    public function getEventdate()
    {
        return $this->eventdate;
    }

    /**
     * @param string $eventdate
     */
    public function setEventdate($eventdate)
    {
        $this->eventdate = $eventdate;
    }

    /**
     * @return ObjectStorage
     */
    public function getSpeakerimage()
    {
        return $this->speakerimage;
    }

    /**
     * @param ObjectStorage $speakerimage
     */
    public function setSpeakerimage($speakerimage)
    {
        $this->speakerimage = $speakerimage;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param string $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getEventlanguage()
    {
        return $this->eventlanguage;
    }

    /**
     * @param string $eventlanguage
     */
    public function setEventlanguage($eventlanguage)
    {
        $this->eventlanguage = $eventlanguage;
    }

}