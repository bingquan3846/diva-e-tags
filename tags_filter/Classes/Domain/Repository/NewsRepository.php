<?php

namespace Divae\TagsFilter\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;

class NewsRepository extends \GeorgRinger\News\Domain\Repository\NewsRepository
{

    public function initializeObject()
    {
        $defaultQuerySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

    /**
     * @param  TYPO3\CMS\Extbase\Persistence\Generic\QueryResult  $tags
     * @param array $fields, for example array( 'category' => 1)
     * @param bool $limit
     * @param int $random
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function getByTags(QueryResult $tags, $fields = [], $limit = false, $random = 0 )
    {
        $query = $this->createQuery();
        $constraintsTags = null;
        $constraintsFields = null;
        foreach($tags as $tag)
        {
            $constraintsTags[] = $query->contains('tags', $tag);

        }

        // other fields condition
        if(!empty($fields)){
            foreach($fields as $key => $value){
                $objectStorage = null;
                if($key == 'categories'){

                    $catIds = explode(',', $value);
                    foreach($catIds as $catId)
                    {
                        $categoryRepository = $this->objectManager->get('GeorgRinger\News\Domain\Repository\CategoryRepository');
                        $category = $categoryRepository->findByUid($catId);
                        $constraintsFields[] = $query->contains($key, $category);
                    }

                }

            }
        }


        // filter the result
        if(!empty($constraintsFields)){
            $query->matching($query->logicalAnd(array($query->logicalOr($constraintsTags), $query->logicalOr($constraintsFields))));
        }else{
            $query->matching($query->logicalOr($constraintsTags));
        }

        // set limit and random
        if($limit){
            if($random){
                $rows = $query->execute()->count();
                if($rows > $limit){
                    $row_number = mt_rand(0, max(0, ($rows - $limit)));
                }else{
                    $row_number = 0;
                }

                $query->setOffset($row_number)->setLimit((int) $limit);
            }else{
                $query->setLimit((int) $limit);
            }
        }



        $result = $query->execute();

        /*$parser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbQueryParser');
        $queryParts = $parser->parseQuery($query);
        \TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParts, 'query');
        \TYPO3\CMS\Core\Utility\DebugUtility::debug(count($query->execute()), 'number of results');*/


        return $result;


    }
}