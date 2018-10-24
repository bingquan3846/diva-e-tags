<?php
namespace Divae\DivaeLocationManager\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class JobTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Divae\DivaeLocationManager\Domain\Model\Job
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Divae\DivaeLocationManager\Domain\Model\Job();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getType()
        );

    }

    /**
     * @test
     */
    public function setTypeForStringSetsType()
    {
        $this->subject->setType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'type',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPositionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPosition()
        );

    }

    /**
     * @test
     */
    public function setPositionForStringSetsPosition()
    {
        $this->subject->setPosition('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'position',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDurationReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDuration()
        );

    }

    /**
     * @test
     */
    public function setDurationForStringSetsDuration()
    {
        $this->subject->setDuration('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'duration',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDepartmentReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDepartment()
        );

    }

    /**
     * @test
     */
    public function setDepartmentForStringSetsDepartment()
    {
        $this->subject->setDepartment('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'department',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPublicationDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPublicationDate()
        );

    }

    /**
     * @test
     */
    public function setPublicationDateForDateTimeSetsPublicationDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPublicationDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'publicationDate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTaskHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTaskHeadline()
        );

    }

    /**
     * @test
     */
    public function setTaskHeadlineForStringSetsTaskHeadline()
    {
        $this->subject->setTaskHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'taskHeadline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTaskTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTaskText()
        );

    }

    /**
     * @test
     */
    public function setTaskTextForStringSetsTaskText()
    {
        $this->subject->setTaskText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'taskText',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getEmployerHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmployerHeadline()
        );

    }

    /**
     * @test
     */
    public function setEmployerHeadlineForStringSetsEmployerHeadline()
    {
        $this->subject->setEmployerHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'employerHeadline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getEmployerTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmployerText()
        );

    }

    /**
     * @test
     */
    public function setEmployerTextForStringSetsEmployerText()
    {
        $this->subject->setEmployerText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'employerText',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getWorkplaceHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWorkplaceHeadline()
        );

    }

    /**
     * @test
     */
    public function setWorkplaceHeadlineForStringSetsWorkplaceHeadline()
    {
        $this->subject->setWorkplaceHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'workplaceHeadline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getWorkplaceTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWorkplaceText()
        );

    }

    /**
     * @test
     */
    public function setWorkplaceTextForStringSetsWorkplaceText()
    {
        $this->subject->setWorkplaceText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'workplaceText',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getRequirementHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRequirementHeadline()
        );

    }

    /**
     * @test
     */
    public function setRequirementHeadlineForStringSetsRequirementHeadline()
    {
        $this->subject->setRequirementHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'requirementHeadline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getRequirementTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRequirementText()
        );

    }

    /**
     * @test
     */
    public function setRequirementTextForStringSetsRequirementText()
    {
        $this->subject->setRequirementText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'requirementText',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getProcessHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getProcessHeadline()
        );

    }

    /**
     * @test
     */
    public function setProcessHeadlineForStringSetsProcessHeadline()
    {
        $this->subject->setProcessHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'processHeadline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getProcessTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getProcessText()
        );

    }

    /**
     * @test
     */
    public function setProcessTextForStringSetsProcessText()
    {
        $this->subject->setProcessText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'processText',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getContactHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContactHeadline()
        );

    }

    /**
     * @test
     */
    public function setContactHeadlineForStringSetsContactHeadline()
    {
        $this->subject->setContactHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'contactHeadline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getContactTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContactText()
        );

    }

    /**
     * @test
     */
    public function setContactTextForStringSetsContactText()
    {
        $this->subject->setContactText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'contactText',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getJobNumberReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setJobNumberForIntSetsJobNumber()
    {
    }

    /**
     * @test
     */
    public function getFormLinkReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFormLink()
        );

    }

    /**
     * @test
     */
    public function setFormLinkForStringSetsFormLink()
    {
        $this->subject->setFormLink('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'formLink',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getStateReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getState()
        );

    }

    /**
     * @test
     */
    public function setStateForStringSetsState()
    {
        $this->subject->setState('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'state',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getLocationsReturnsInitialValueForLocation()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getLocations()
        );

    }

    /**
     * @test
     */
    public function setLocationsForObjectStorageContainingLocationSetsLocations()
    {
        $location = new \Divae\DivaeLocationManager\Domain\Model\Location();
        $objectStorageHoldingExactlyOneLocations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneLocations->attach($location);
        $this->subject->setLocations($objectStorageHoldingExactlyOneLocations);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneLocations,
            'locations',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addLocationToObjectStorageHoldingLocations()
    {
        $location = new \Divae\DivaeLocationManager\Domain\Model\Location();
        $locationsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($location));
        $this->inject($this->subject, 'locations', $locationsObjectStorageMock);

        $this->subject->addLocation($location);
    }

    /**
     * @test
     */
    public function removeLocationFromObjectStorageHoldingLocations()
    {
        $location = new \Divae\DivaeLocationManager\Domain\Model\Location();
        $locationsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($location));
        $this->inject($this->subject, 'locations', $locationsObjectStorageMock);

        $this->subject->removeLocation($location);

    }
}
