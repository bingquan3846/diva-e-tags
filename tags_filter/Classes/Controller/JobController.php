<?php
namespace Divae\TagsFilter\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class JobController extends  ActionController
{
    /**
     * @var \Divae\TagsFilter\Domain\Repository\JobRepository
     */
    protected $jobRepository = NULL;

    /**
     * @inject \Divae\TagsFilter\Domain\Repository\JobRepository $jobRepository
     */
    public function injectJobRepository(\Divae\TagsFilter\Domain\Repository\JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }


    /**
     *
     */
    public function countAction()
    {
        $count = $this->jobRepository->findAll()->count();
        $this->view->assign('count', $count);
    }
}