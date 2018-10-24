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

/**
 * Job
 */
/**
 * Class Job
 * @package Divae\DivaeLocationManager\Domain\Model
 */
class Job extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * state
     *
     * @var string
     */
    protected $state = '';
    /**
     * pid
     *
     * @var string
     */
    protected $pid = '';
    /**
     * hidden
     *
     * @var string
     */
    protected $hidden = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * type
     *
     * @var string
     */
    protected $type = '';

    /**
     * position
     *
     * @var string
     */
    protected $position = '';

    /**
     * duration
     *
     * @var string
     */
    protected $duration = '';

    /**
     * department
     *
     * @var string
     */
    protected $department = '';

    /**
     * publicationDate
     *
     * @var \DateTime
     */
    protected $publicationDate = null;

    /**
     * taskHeadline
     *
     * @var string
     */
    protected $taskHeadline = '';

    /**
     * taskText
     *
     * @var string
     */
    protected $taskText = '';

    /**
     * employerHeadline
     *
     * @var string
     */
    protected $employerHeadline = '';

    /**
     * employerText
     *
     * @var string
     */
    protected $employerText = '';

    /**
     * workplaceHeadline
     *
     * @var string
     */
    protected $workplaceHeadline = '';

    /**
<<<<<<< HEAD
     * workplaceText
     * 
     * @var string
     */
    protected $workplaceText = '';

    /**
     * requirementHeadline
     *
     * @var string
     */
    protected $requirementHeadline = '';

    /**
     * requirementText
     *
     * @var string
     */
    protected $requirementText = '';

    /**
     * processHeadline
     *
     * @var string
     */
    protected $processHeadline = '';

    /**
     * processText
     *
     * @var string
     */
    protected $processText = '';

    /**
     * contactHeadline
     *
     * @var string
     */
    protected $contactHeadline = '';

    /**
     * contactText
     *
     * @var string
     */
    protected $contactText = '';

    /**
     * jobNumber
     *
     * @var int
     */
    protected $jobNumber = 0;

    /**
     * formLink
     *
     * @var string
     */
    protected $formLink = '';

    /**
     * locations
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\DivaeLocationManager\Domain\Model\Location>
     */
    protected $locations = null;


    /**
     * Returns the state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the state
     *
     * @param string $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }
    /**
     * @return string
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param string $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return string
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param string $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }


    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the position
     *
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param string $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the duration
     *
     * @return string $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the duration
     *
     * @param string $duration
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Returns the department
     *
     * @return string $department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets the department
     *
     * @param string $department
     * @return void
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * Returns the publicationDate
     *
     * @return \DateTime $publicationDate
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Sets the publicationDate
     *
     * @param \DateTime $publicationDate
     * @return void
     */
    public function setPublicationDate(\DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Returns the employerHeadline
     *
     * @return string $employerHeadline
     */
    public function getEmployerHeadline()
    {
        return $this->employerHeadline;
    }

    /**
     * Sets the employerHeadline
     *
     * @param string $employerHeadline
     * @return void
     */
    public function setEmployerHeadline($employerHeadline)
    {
        $this->employerHeadline = $employerHeadline;
    }

    /**
     * Returns the taskHeadline
     *
     * @return string taskHeadline
     */
    public function getTaskHeadline()
    {
        return $this->taskHeadline;
    }

    /**
     * Sets the taskHeadline
     *
     * @param string $taskHeadline
     * @return void
     */
    public function setTaskHeadline($taskHeadline)
    {
        $this->taskHeadline = $taskHeadline;
    }

    /**
     * Returns the taskText
     *
     * @return string taskText
     */
    public function getTaskText()
    {
        return $this->taskText;
    }

    /**
     * Sets the taskText
     *
     * @param string $taskText
     * @return void
     */
    public function setTaskText($taskText)
    {
        $this->taskText = $taskText;
    }

    /**
     * Returns the employerText
     *
     * @return string employerText
     */
    public function getEmployerText()
    {
        return $this->employerText;
    }

    /**
     * Sets the employerText
     *
     * @param string $employerText
     * @return void
     */
    public function setEmployerText($employerText)
    {
        $this->employerText = $employerText;
    }

    /**
     * Returns the workplaceHeadline
     *
     * @return string $workplaceHeadline
     */
    public function getWorkplaceHeadline()
    {
        return $this->workplaceHeadline;
    }

    /**
     * Sets the workplaceHeadline
     *
     * @param string $workplaceHeadline
     * @return void
     */
    public function setWorkplaceHeadline($workplaceHeadline)
    {
        $this->workplaceHeadline = $workplaceHeadline;
    }

    /**
     * Returns the workplaceText
     * 
     * @return string $workplaceText
     */
    public function getWorkplaceText()
    {
        return $this->workplaceText;
    }

    /**
     * Sets the workplaceText
     * 
     * @param string $workplaceText
     * @return void
     */
    public function setWorkplaceText($workplaceText)
    {
        $this->workplaceText = $workplaceText;
    }

    /**
     * Returns the requirementHeadline
     *
     * @return string $requirementHeadline
     */
    public function getRequirementHeadline()
    {
        return $this->requirementHeadline;
    }

    /**
     * Sets the requirementHeadline
     *
     * @param string $requirementHeadline
     * @return void
     */
    public function setRequirementHeadline($requirementHeadline)
    {
        $this->requirementHeadline = $requirementHeadline;
    }

    /**
     * Returns the requirementText
     *
     * @return string $requirementText
     */
    public function getRequirementText()
    {
        return $this->requirementText;
    }

    /**
     * Sets the requirementText
     *
     * @param string $requirementText
     * @return void
     */
    public function setRequirementText($requirementText)
    {
        $this->requirementText = $requirementText;
    }

    /**
     * Returns the processHeadline
     *
     * @return string $processHeadline
     */
    public function getProcessHeadline()
    {
        return $this->processHeadline;
    }

    /**
     * Sets the processHeadline
     *
     * @param string $processHeadline
     * @return void
     */
    public function setProcessHeadline($processHeadline)
    {
        $this->processHeadline = $processHeadline;
    }

    /**
     * Returns the processText
     *
     * @return string $processText
     */
    public function getProcessText()
    {
        return $this->processText;
    }

    /**
     * Sets the processText
     *
     * @param string $processText
     * @return void
     */
    public function setProcessText($processText)
    {
        $this->processText = $processText;
    }

    /**
     * Returns the contactHeadline
     *
     * @return string $contactHeadline
     */
    public function getContactHeadline()
    {
        return $this->contactHeadline;
    }

    /**
     * Sets the contactHeadline
     *
     * @param string $contactHeadline
     * @return void
     */
    public function setContactHeadline($contactHeadline)
    {
        $this->contactHeadline = $contactHeadline;
    }

    /**
     * Returns the contactText
     *
     * @return string $contactText
     */
    public function getContactText()
    {
        return $this->contactText;
    }

    /**
     * Sets the contactText
     *
     * @param string $contactText
     * @return void
     */
    public function setContactText($contactText)
    {
        $this->contactText = $contactText;
    }

    /**
     * Returns the jobNumber
     *
     * @return int $jobNumber
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets the jobNumber
     *
     * @param int $jobNumber
     * @return void
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;
    }

    /**
     * Returns the formLink
     *
     * @return string $formLink
     */
    public function getFormLink()
    {
        return $this->formLink;
    }

    /**
     * Sets the formLink
     *
     * @param string $formLink
     * @return void
     */
    public function setFormLink($formLink)
    {
        $this->formLink = $formLink;
    }

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
        $this->locations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Location
     *
     * @param \Divae\DivaeLocationManager\Domain\Model\Location $location
     * @return void
     */
    public function addLocation(\Divae\DivaeLocationManager\Domain\Model\Location $location)
    {
        $this->locations->attach($location);
    }

    /**
     * Removes a Location
     *
     * @param \Divae\DivaeLocationManager\Domain\Model\Location $locationToRemove The Location to be removed
     * @return void
     */
    public function removeLocation(\Divae\DivaeLocationManager\Domain\Model\Location $locationToRemove)
    {
        $this->locations->detach($locationToRemove);
    }

    /**
     * Returns the locations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\DivaeLocationManager\Domain\Model\Location> $locations
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Sets the locations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\DivaeLocationManager\Domain\Model\Location> $locations
     * @return void
     */
    public function setLocations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $locations)
    {
        $this->locations = $locations;
    }
}
