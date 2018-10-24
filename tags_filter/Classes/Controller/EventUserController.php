<?php

namespace Divae\TagsFilter\Controller;


use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/**
 * Class EventUserController
 * @package Divae\TagsFilter\Controller
 */
class EventUserController extends ActionController
{

    /**
     * @var \Divae\TagsFilter\Domain\Repository\EventUserRepository
     * @inject
     */
    protected $eventUserRepository;

    protected function initializeAction()
    {
        $this->defaultViewObjectName = JsonView::class;
    }
    public function registerEventAction(){

        $arguments = $this->request->getArguments();

        $exist = $this->eventUserRepository->findByEmailEvent($arguments['email'],  $arguments['news']);

        if(!($exist->count())){
            /**@var \Divae\TagsFilter\Domain\Model\EventUser $eventUser **/
            $eventUser = $this->objectManager->get(\Divae\TagsFilter\Domain\Model\EventUser::class);

            $eventUser->setTitle($arguments['title']);
            $eventUser->setNews($arguments['news']);
            $eventUser->setEmail($arguments['email']);
            $eventUser->setFirstname($arguments['firstname']);
            $eventUser->setLastname($arguments['lastname']);
            $eventUser->setPosition($arguments['position']);
            $eventUser->setCompany($arguments['company']);
            $eventUser->setQuestion($arguments['question']);

            /**@var PersistenceManager $persistenceManager **/
            $persistenceManager = $this->objectManager->get(PersistenceManager::class);

            $persistenceManager->add($eventUser);
            $persistenceManager->persistAll();
            $this->view->assign('status', 1);
        }else{
            $this->view->assign('status', 2);
        }

        $this->view->setVariablesToRender(['status']);

        $this->view->render();

    }
}