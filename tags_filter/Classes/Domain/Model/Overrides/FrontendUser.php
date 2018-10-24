<?php

namespace Divae\TagsFilter\Domain\Model;


class FrontendUser extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{

    /**
     * @var string
     */
    protected $position = null;
    /**
     * @var string
     */
    protected $quotation = '';

    /**
     * FrontendUser constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct($username = '', $password = '')
    {
        parent::__construct();
    }

    /**
     * @return null
     */
    public function getFirstImage()
    {
        $image = null;
        if(!empty($this->getImage())){
            $images = explode(',', $this->getImage());
            $image =  $images[0];
        }

        return $image;

    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getQuotation()
    {
        return $this->quotation;
    }

    /**
     * @param string $quotation
     */
    public function setQuotation($quotation)
    {
        $this->quotation = $quotation;
    }



}