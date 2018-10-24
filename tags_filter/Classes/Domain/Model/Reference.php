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
 * Reference
 */
class Reference extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * teaser
     *
     * @var string
     */
    protected $teaser = '';
    /**
     * @var string
     */
    protected $link = '';
    /**
     * @var string
     */
    protected $shortdescription = '';
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * pics
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $defaultpic = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $hoverpic = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $detailpic = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $teaserpic = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Tag>
     * @lazy
     */
    protected $tags = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\FrontendUser>
     * @lazy
     */
    protected $colleges = null;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @lazy
     */
    protected $categories = NULL;

    /**
     * Reference constructor.
     */
    public function __construct()
    {
        $this->tags = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();

        $this->defaultpic = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->hoverpic = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->detailpic = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->teaserpic = \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
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
    public function addTag(\Divae\TagsFilter\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * @param \GeorgRinger\News\Domain\Model\Tag $tag
     */
    public function removeTag(\Divae\TagsFilter\Domain\Model\Tag $tag)
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
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getDefaultpic()
    {
        return $this->defaultpic;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $defaultpic
     */
    public function setDefaultpic($defaultpic)
    {
        $this->defaultpic = $defaultpic;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getHoverpic()
    {
        return $this->hoverpic;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $hoverpic
     */
    public function setHoverpic($hoverpic)
    {
        $this->hoverpic = $hoverpic;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getDetailpic()
    {
        return $this->detailpic;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $detailpic
     */
    public function setDetailpic($detailpic)
    {
        $this->detailpic = $detailpic;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTeaserpic()
    {
        return $this->teaserpic;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teaserpic
     */
    public function setTeaserpic($teaserpic)
    {
        $this->teaserpic = $teaserpic;
    }

}