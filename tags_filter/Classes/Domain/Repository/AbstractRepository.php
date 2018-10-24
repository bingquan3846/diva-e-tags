<?php

namespace Divae\TagsFilter\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\Repository;

class AbstractRepository  extends  Repository
{
    public function initializeObject()
    {
        $defaultQuerySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

    public function getByTags(QueryResult $tags, $fields = [], $limit = 0, $random = 0)
    {

        $query = $this->createQuery();

        $constrains = [];

        if(!empty($tags)){
            foreach($tags as $tag){
                $constrains[] = $query->contains('tags', $tag);
            }
        }

        $query->matching($query->logicalOr($constrains));

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
                $query->setLimit( (int)$limit);
            }
        }

        /*$parser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbQueryParser');
        $queryParts = $parser->parseQuery($query);
        \TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParts, 'query');
        \TYPO3\CMS\Core\Utility\DebugUtility::debug(count($query->execute()), 'number of results');*/

        return $query->execute();

    }

}