<?php

namespace Divae\TagsFilter\Controller;


use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class AjaxController  extends ActionController
{


    /**
     * @var \Divae\TagsFilter\Domain\Repository\ReferenceRepository
     */
    protected $referenceRepository = null;

    /**
     * @inject \Divae\TagsFilter\Domain\Repository\ReferenceRepository $referenceRepository
     */
    public function injectReferenceRepository(\Divae\TagsFilter\Domain\Repository\ReferenceRepository $referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;
    }

    protected function initializeAction()
    {
        //$this->defaultViewObjectName = JsonView::class;
    }


    public function showReferenceAction()
    {

        $arguments  = $this->request->getArguments();

        $reference = $this->referenceRepository->findByUid((int)$arguments['object']);

        $tags = $reference->getTags();
        $tagsArray = [];
        if($tags->count())
        {
            foreach($tags as $tag)
            {
                $tagsArray[] = [$tag->getTitle(), $tag->getLink()];
            }
        }

       $this->view->assign('reference', $reference);
    }

}