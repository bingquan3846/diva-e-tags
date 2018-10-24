<?php
/**
 * Created by PhpStorm.
 * User: Bingquan Bao
 * Date: 21.03.2017
 * Time: 14:09
 */

namespace Divae\TagsFilter\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class CaseStudyController
 * @package Divae\TagsFilter\Controller
 */
class CaseStudyController extends  ActionController
{
    /**
     * @var \Divae\TagsFilter\Domain\Repository\CaseStudyRepository
     */
    protected $caseStudyRepository = NUll;

    /**
     * @inject
     */
    public function injectCaseStudyRepository(\Divae\TagsFilter\Domain\Repository\CaseStudyRepository $caseStudyRepository)
    {
        $this->caseStudyRepository = $caseStudyRepository;
    }

    /**
     *
     */
    public function showAction()
    {
        $pageUid = $GLOBALS['TSFE']->id;

        $caseStudy = $this->caseStudyRepository->findOneByPage($pageUid);

        if($caseStudy){

            $circleData = $this->getServiceCircle($caseStudy->getStatistic(), $caseStudy->getCategories());

            $this->view->assign('caseStudy', $caseStudy);
            $this->view->assign('circleData', $circleData);
            $previous = $this->caseStudyRepository->findNeighbor($caseStudy->getSorting());
            $next = $this->caseStudyRepository->findNeighbor($caseStudy->getSorting(), false);
            $this->view->assign('previous', $previous);
            $this->view->assign('next', $next);
        }else{
            return ;
        }

    }

    /**
     * @param $data
     * @param $categories
     * @return array
     */
    public function getServiceCircle($data, $categories)
    {
        $datas = preg_split( '/\r\n|\r|\n/', $data );

        $statistic = [];
        foreach($datas as $value){
            $item = explode(',',  $value);
            $statistic[$item[0]] = $item[1];
        }


        $categoryObjects = $categories;
        $categories = [];
        $parentsCategories = [];

        foreach($categoryObjects as $category){
            if(!empty($category->getParent())){
                if(!key_exists($category->getParent()->getUid(), $categories)){
                    $parentsCategories[$category->getParent()->getUid()] = [$category->getParent()->getUid(), $category->getParent()->getTitle(), $category->getParent()->getDescription(), $statistic[$category->getParent()->getTitle()]];
                    $categories[$category->getParent()->getUid()][] = [$category->getUid(), $category->getTitle(), $category->getDescription(), $statistic[$category->getTitle()]];
                }elseif(!key_exists($category->getUid(), $categories)){
                    array_push($categories[$category->getParent()->getUid()], [$category->getUid(), $category->getTitle(), $category->getDescription(), $statistic[$category->getTitle()]]);
                }
            }else{
                $parentsCategories[$category->getUid()] = [$category->getUid(), $category->getTitle(), $category->getDescription(), $statistic[$category->getTitle()]];
                $categories[$category->getUid()] = [];

            }
        }

        $returnArray = [];
        foreach($categories as $key => $category)
        {
            if(count($category) > 2){
                $returnArray[$key] = [$parentsCategories[$key], 'subcategories' => $category];
            }
        }

        return $returnArray;

    }

    /**
     *
     */
    public function homeBannerAction()
    {
        $arguments = $this->request->getArguments();
        $caseStudies = $this->caseStudyRepository->findAllCaseStudies();
        if(!empty($arguments['item'])) {
            $randomOne = $this->caseStudyRepository->findOneByUid($arguments['item']);
            $this->view->assign('single', 1);
        }else{
            shuffle($caseStudies);
            $randomOne = $caseStudies[0];
        }


        $this->view->assign('caseStudies', $caseStudies);
        $this->view->assign('randomOne', $randomOne);
    }
}