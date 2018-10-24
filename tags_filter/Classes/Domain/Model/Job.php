<?php
namespace Divae\TagsFilter\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Bingquan Bao <bingquan.bao@diva-e.com>, diva-e
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Jobs
 */
class Job extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * type
     *
     * @var string
     */
    protected $type = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\Tag>
     */
    protected $tags = '';


    /**
     * Job constructor.
     */
    public function __construct()
    {
        $this->tags = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Return the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param \GeorgRinger\News\Domain\Model\Tag $tag
     */
    public function addTag(\GeorgRinger\News\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * @param \GeorgRinger\News\Domain\Model\Tag $tag
     */
    public function removeTag(\GeorgRinger\News\Domain\Model\Tag $tag)
    {
        $this->tags->detach($tag);
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
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }



}