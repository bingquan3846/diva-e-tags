<?php
namespace Divae\NewsletterCr\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Bingquan Bao <bingquan.bao@diva-e.com>, diva-e zerosone
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
 * Users
 */
class Users extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * @var \DateTime
     */
    protected $register = '';
    /**
     * @var string
     */
    protected $firstname = '';
    /**
     * @var string
     */
    protected $lastname = '';
    /**
     * @var string
     */
    protected $position = '';
    /**
     * @var string
     */
    protected $company = '';
    
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
     * @return \DateTime
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @param \DateTime $register
     */
    public function setRegister($register)
    {
        $this->register = $register;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }



}