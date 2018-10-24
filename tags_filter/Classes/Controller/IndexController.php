<?php
namespace Divae\TagsFilter\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class IndexController extends ActionController
{

    /**
     * @var  \Divae\TagsFilter\Domain\Repository\PageRepository
     */
    protected $pageRepository = null;

    /**
     * @var \Divae\TagsFilter\Domain\Repository\ServiceRepository
     */
    protected $serviceRepository = null;
    /**
     * @var \Divae\TagsFilter\Domain\Repository\ReferenceRepository
     */
    protected $referenceRepository = null;
    /**
     * @var \Divae\TagsFilter\Domain\Repository\TagRepository
     */
    protected $tagRepository = null;


    /**
     * @inject
     */
    public function injectPageRepository(\Divae\TagsFilter\Domain\Repository\PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @inject
     */
    public function injectServiceRepository(\Divae\TagsFilter\Domain\Repository\ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @inject \Divae\TagsFilter\Domain\Repository\ReferenceRepository $referenceRepository
     */
    public function injectReferenceRepository(\Divae\TagsFilter\Domain\Repository\ReferenceRepository $referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;
    }

    /**
     * @inject \Divae\TagsFilter\Domain\Repository\TagRepository $tagRepository
     */
    public function injectTagRepository(\Divae\TagsFilter\Domain\Repository\TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }


    /**
     * list the sercices accordign to the selected category
     */
    public function servicesAction()
    {

        $categories  = $this->getPage()->getCategories();

        if($categories->count()){
            $services = $this->serviceRepository->findByCategories($categories);
            $this->view->assign('services', $services);
        }

    }

    /**
     * @return mixed
     */
    public function servicesInMenuAction()
    {
        $page = $this->getPage();
        return $page;
    }

    /**
     * service detail page
     */
    public function showServiceAction()
    {
        $arguments = $this->request->getArguments();
        $content = $this->configurationManager->getContentObject();

        $serviceUid = NULL;
        if(!empty($arguments['service'])){

            $serviceUid = $arguments['service'];
            $service  = $this->serviceRepository->findByUid($serviceUid);

            $GLOBALS['TSFE']->page['keywords'] = $service->getKeywords();

            $this->view->assign('service', $service);

            $tags = $this->tagRepository->findByService($service);
            if($tags->count()){
                $items = $this->getRelatedItems($tags);
                $this->view->assign('items', $items);
            }

            if($content->data['select_key'] != 'single'){

                $category = $this->getPage()->getCategories();
                $services = $this->serviceRepository->findByCategories($category, $arguments['service']);
                $this->view->assign('services',  $services);

                $this->view->assign('category', $category->toArray());

                $uriBuilder = $this->controllerContext->getUriBuilder();
                $url = $uriBuilder->setTargetPageUid('102')->uriFor('showService', ['service' => $service], 'Index', 'Tagsfilter', 'showservice');
                $this->response->addAdditionalHeaderData('<link rel="canonical" href=" ' . $url . ' " />');
            }

            $this->view->assign('mode', $content->data['select_key']);

        }
    }

    /**
     * @param $tags
     * @return array
     */
    public function getRelatedItems($tags)
    {

        $objects = $this->settings['objects'];
        $items = [];
        $repository = null;
        $categoryRepository = $this->objectManager->get('TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository');

        foreach($objects as $object){
            if(get_class($repository) != $object['repository']){
                $repository = $this->objectManager->get($object['repository']);
            }
            if(!empty($object['fields']['categories'])){
                $category = $categoryRepository->findByUid($object['fields']['categories']);

            }

            $queryResult =  $repository->getByTags($tags, $object['fields'], $object['limit'], $object['random']);
            if($queryResult->count()){
                $items[] = [ $object['partialFolder'], $queryResult, $category ];
            }
        }

        return $items;

    }


    /**
     *
     */
    public function referencesAction()
    {
        $references = $this->referenceRepository->getAll();

        $categoriesArray = [];
        if($references->count())
        {
            foreach($references as $reference)
            {
                $categories = $reference->getCategories();
                if($categories->count()){
                    foreach($categories as $category)
                    {
                        if( $category && !key_exists($category->getUid(), $categoriesArray)){
                            $categoriesArray[$category->getUid()] = $category->getTitle();
                        }
                    }
                }
            }
        }
        asort($categoriesArray);

        $arguments = $this->request->getArguments();
        $singleReference = null;
        if(!empty($arguments['reference']))
        {
            $this->view->assign('singleReference', $arguments['reference']);
        }

        $this->view->assign('references', $references);

        $this->view->assign('categories', $categoriesArray);
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        $pageUid = $GLOBALS['TSFE']->id;
        $page = $this->pageRepository->findByUid($pageUid);


        return $page;
    }
}