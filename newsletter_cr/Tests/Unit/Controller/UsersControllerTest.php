<?php
namespace Divae\NewsletterCr\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Bingquan Bao <bingquan.bao@diva-e.com>, diva-e zerosone
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Divae\NewsletterCr\Controller\UsersController.
 *
 * @author Bingquan Bao <bingquan.bao@diva-e.com>
 */
class UsersControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Divae\NewsletterCr\Controller\UsersController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Divae\\NewsletterCr\\Controller\\UsersController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllUserssFromRepositoryAndAssignsThemToView()
	{

		$allUserss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$usersRepository = $this->getMock('Divae\\NewsletterCr\\Domain\\Repository\\UsersRepository', array('findAll'), array(), '', FALSE);
		$usersRepository->expects($this->once())->method('findAll')->will($this->returnValue($allUserss));
		$this->inject($this->subject, 'usersRepository', $usersRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('userss', $allUserss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
