<?php
namespace Divae\DivaeLocationManager\Domain\Model;

/***
 *
 * This file is part of the "Location Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Location
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected $uid;
    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * zip
     * 
     * @var string
     */
    protected $zip = '';

    /**
     * city
     * 
     * @var string
     */
    protected $city = '';

    /**
     * street
     * 
     * @var string
     */
    protected $street = '';

    /**
     * latitude
     * 
     * @var string
     */
    protected $latitude = '';

    /**
     * longitude
     * 
     * @var string
     */
    protected $longitude = '';

    /**
     * tel
     * 
     * @var string
     */
    protected $tel = '';

    /**
     * fax
     * 
     * @var string
     */
    protected $fax = '';

    /**
     * email
     * 
     * @var string
     */
    protected $email = '';
    /**
     * @var string
     */
    protected $page = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Advantage>
     */
    protected $advantage = NULL;
    /**
     * pics
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $pics = null;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\DivaeLocationManager\Domain\Model\Job>
     * @lazy
     */
    protected $jobs = null;
    /**
     * @var string
     */
    protected $jobsnumber = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->advantage = new ObjectStorage();
        $this->pics = new ObjectStorage();
        $this->jobs = new ObjectStorage();
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


    /**
     * Returns the city
     * 
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     * 
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the longitude
     * 
     * @return string $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     * 
     * @param string $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Returns the latitude
     * 
     * @return string $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude
     * 
     * @param string $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the zip
     * 
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     * 
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the street
     * 
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street
     * 
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Returns the tel
     * 
     * @return string $tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Sets the tel
     * 
     * @param string $tel
     * @return void
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the name
     * 
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the fax
     * 
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Sets the fax
     * 
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return ObjectStorage
     */
    public function getAdvantage()
    {
        return $this->advantage;
    }

    /**
     * @param ObjectStorage $advantages
     */
    public function setAdvantage($advantage)
    {
        $this->advantage = $advantage;
    }

    /**
     * @return ObjectStorage
     */
    public function getPics()
    {
        return $this->pics;
    }

    /**
     * @param ObjectStorage $pics
     */
    public function setPics($pics)
    {
        $this->pics = $pics;
    }

    /**
     * @return ObjectStorage
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param ObjectStorage $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @return string
     */
    public function getJobsnumber()
    {
        return $this->jobsnumber;
    }

    /**
     * @param string $jobsnumber
     */
    public function setJobsnumber($jobsnumber)
    {
        $this->jobsnumber = $jobsnumber;
    }
}
