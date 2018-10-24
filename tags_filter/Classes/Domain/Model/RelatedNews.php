<?php

namespace Divae\TagsFilter\Domain\Model;


use GeorgRinger\News\Domain\Model\News;

class RelatedNews extends  News
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Divae\TagsFilter\Domain\Model\Tag>
     * @lazy
     */
    protected $tags;

    public function __construct()
    {
        parent::__construct();

        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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