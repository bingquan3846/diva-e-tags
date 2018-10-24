<?php

namespace Divae\TagsFilter\Service;

use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Core\Html\HtmlParser;
use Divae\TagsFilter\Domain\Repository\NewsRepository;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class Search
{

    protected $searchWords = '';
    protected $settings = [
        'markupSW_summaryMax' => '300',
        'markupSW_postPreLgd' => '60',
        'markupSW_postPreLgd_offset' => '5',
        'markupSW_divider' => '...',
        'summaryCropAfter' => '180'
    ];

    public function getDisplayResults($searchWords, $resultData, $freeIndexUid)
    {

        $this->searchWords = $searchWords;
        $result = [
            'count' => $resultData['count'],
            'searchWords' => $searchWords
        ];


        // Perform display of result rows array
        if ($resultData) {
            // Set first selected row (for calculation of ranking later)
            $this->firstRow = $resultData['firstRow'];
            // Result display here
            $rows = $this->compileResultRows($resultData['resultRows'], $freeIndexUid);
            $newRows = [ 102 =>[], 53 => [], 3 => [] ];
            $count = 0;
            $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
            $newsRepository = $objectManager->get(NewsRepository::class);
            foreach($rows as $row){
                if(key_exists($row['page_id'], $newRows)){
                    $news = null;
                    if( $row['page_id'] == 53 ){
                        $news = $newsRepository->findByUid($row['urlParameters']['tx_news_pi1[news]']);
                    }
                    if($news){
                        $row['publishDate'] =  $news->getDatetime();
                    }
                    array_push($newRows[$row['page_id']], $row);
                    $count++;
                }else{
                    $newRows[999][] = $row;
                }
            }

            $result['rows'] = $newRows;
            $result['count'] = $count;
            $result['affectedSections'] = $this->resultSections;
            // Browsing box
            if ($resultData['count']) {
                // could we get this in the view?
                if ($this->searchData['group'] == 'sections' && $freeIndexUid <= 0) {
                    $resultSectionsCount = count($this->resultSections);
                    $result['sectionText'] = sprintf(LocalizationUtility::translate('result.' . ($resultSectionsCount > 1 ? 'inNsections' : 'inNsection'), 'IndexedSearch'), $resultSectionsCount);
                }
            }
        }


        $result['searchedInSectionInfo'] = $this->searchData['sections'];

        return $result;
    }


    public function compileResultRows($resultRows, $freeIndexUid = -1)
    {
        $finalResultRows = [];
        // Transfer result rows to new variable,
        // performing some mapping of sub-results etc.
        $newResultRows = [];
        foreach ($resultRows as $row) {
            $id = md5($row['phash_grouping']);
            if (is_array($newResultRows[$id])) {
                // swapping:
                if (!$newResultRows[$id]['show_resume'] && $row['show_resume']) {
                    // Remove old
                    $subrows = $newResultRows[$id]['_sub'];
                    unset($newResultRows[$id]['_sub']);
                    $subrows[] = $newResultRows[$id];
                    // Insert new:
                    $newResultRows[$id] = $row;
                    $newResultRows[$id]['_sub'] = $subrows;
                } else {
                    $newResultRows[$id]['_sub'][] = $row;
                }
            } else {
                $newResultRows[$id] = $row;
            }
        }
        $resultRows = $newResultRows;

        // flat mode or no sections at all
        foreach ($resultRows as $row) {
            $finalResultRows[] = $this->compileSingleResultRow($row);
        }

        return $finalResultRows;
    }


    protected function compileSingleResultRow($row, $headerOnly = 0)
    {
        $specRowConf = [];
        $resultData = $row;
        $resultData['headerOnly'] = $headerOnly;
        $resultData['CSSsuffix'] = $specRowConf['CSSsuffix'] ? '-' . $specRowConf['CSSsuffix'] : '';
        /*if ($this->multiplePagesType($row['item_type'])) {
            $dat = unserialize($row['cHashParams']);
            $pp = explode('-', $dat['key']);
            if ($pp[0] != $pp[1]) {
                $resultData['titleaddition'] = ', ' . LocalizationUtility::translate('result.page', 'IndexedSearch') . ' ' . $dat['key'];
            } else {
                $resultData['titleaddition'] = ', ' . LocalizationUtility::translate('result.pages', 'IndexedSearch') . ' ' . $pp[0];
            }
        }*/
        $title = $resultData['item_title'] . $resultData['titleaddition'];
        //$title = $GLOBALS['TSFE']->csConvObj->crop('utf-8', $title, 50, '...');
        // If external media, link to the media-file instead.
        if ($row['item_type']) {
            if ($row['show_resume']) {
                // Can link directly.
                $targetAttribute = '';
                if ($GLOBALS['TSFE']->config['config']['fileTarget']) {
                    $targetAttribute = ' target="' . htmlspecialchars($GLOBALS['TSFE']->config['config']['fileTarget']) . '"';
                }
                $title = '<a href="' . htmlspecialchars($row['data_filename']) . '"' . $targetAttribute . '>' . htmlspecialchars($title) . '</a>';
            } else {
                // Suspicious, so linking to page instead...
                $copiedRow = $row;
                unset($copiedRow['cHashParams']);
                //$title = $this->linkPage($row['page_id'], htmlspecialchars($title), $copiedRow);
            }
        } else {
            // Else the page:
            // Prepare search words for markup in content:
            $markUpSwParams = [];
            if ($this->settings['forwardSearchWordsInResultLink']['_typoScriptNodeValue']) {
                if ($this->settings['forwardSearchWordsInResultLink']['no_cache']) {
                    $markUpSwParams = ['no_cache' => 1];
                }
                foreach ($this->searchWords as $d) {
                    $markUpSwParams['sword_list'][] = $d['sword'];
                }
            }
            //$title = $this->linkPage($row['data_page_id'], htmlspecialchars($title), $row, $markUpSwParams);
        }
        $resultData['title'] = $title;
        $resultData['urlParameters'] = $this->getUrl($row);
        //$resultData['icon'] = $this->makeItemTypeIcon($row['item_type'], '', $specRowConf);
        //$resultData['rating'] = $this->makeRating($row);
        $resultData['description'] = $this->makeDescription(
            $row,
            false,
            $this->settings['summaryCropAfter']
        );
        //$resultData['language'] = $this->makeLanguageIndication($row);
        $resultData['size'] = GeneralUtility::formatSize($row['item_size']);
        $resultData['created'] = $row['item_crdate'];
        $resultData['modified'] = $row['item_mtime'];
        $pI = parse_url($row['data_filename']);
        if ($pI['scheme']) {
            $targetAttribute = '';
            if ($GLOBALS['TSFE']->config['config']['fileTarget']) {
                $targetAttribute = ' target="' . htmlspecialchars($GLOBALS['TSFE']->config['config']['fileTarget']) . '"';
            }
            $resultData['path'] = '<a href="' . htmlspecialchars($row['data_filename']) . '"' . $targetAttribute . '>' . htmlspecialchars($row['data_filename']) . '</a>';
        } else {
            $pathId = $row['data_page_id'] ?: $row['page_id'];
            $pathMP = $row['data_page_id'] ? $row['data_page_mp'] : '';
            $pathStr = $pathId;
            /*$pathStr = $this->getPathFromPageId($pathId, $pathMP);
            $resultData['path'] = $this->linkPage($pathId, $pathStr, [
                'cHashParams' => $row['cHashParams'],
                'data_page_type' => $row['data_page_type'],
                'data_page_mp' => $pathMP,
                'sys_language_uid' => $row['sys_language_uid']
            ]);*/
        }

        return $resultData;
    }

    protected function getUrl($row)
    {
        $urlParameters = (array)unserialize($row['cHashParams']);

        if ($row['data_page_mp']) {
            $urlParameters['MP'] = $row['data_page_mp'];
        }
        $urlParameters['L'] = intval($row['sys_language_uid']);

        return $urlParameters;

    }

    protected function makeDescription($row, $noMarkup = false, $length = 180)
    {
        if ($row['show_resume']) {
            if (!$noMarkup) {
                $markedSW = '';
                $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'index_fulltext', 'phash=' . (int)$row['phash']);
                if ($ftdrow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
                    // Cut HTTP references after some length
                    $content = preg_replace('/(http:\\/\\/[^ ]{' . $this->settings['results.']['hrefInSummaryCropAfter'] . '})([^ ]+)/i', '$1...', $ftdrow['fulltextdata']);
                    $markedSW = $this->markupSWpartsOfString($content);
                }
                $GLOBALS['TYPO3_DB']->sql_free_result($res);
            }
            if (!trim($markedSW)) {
                $outputStr = $GLOBALS['TSFE']->csConvObj->crop('utf-8', $row['item_description'], $length, '');
                $outputStr = htmlspecialchars($outputStr);
            }
            $output = $outputStr ?: $markedSW;
            $output = $GLOBALS['TSFE']->csConv($output, 'utf-8');
        } else {
            $output = '<span class="noResume">' . LocalizationUtility::translate('result.noResume', 'IndexedSearch') . '</span>';
        }
        return $output;
    }

    protected function markupSWpartsOfString($str)
    {
        $htmlParser = GeneralUtility::makeInstance(HtmlParser::class);
        // Init:
        $str = str_replace('&nbsp;', ' ', $htmlParser->bidir_htmlspecialchars($str, -1));
        $str = preg_replace('/\\s\\s+/', ' ', $str);
        $swForReg = [];
        // Prepare search words for regex:
        foreach ($this->searchWords as $d) {
            $swForReg[] = preg_quote($d['sword'], '/');
        }
        $regExString = '(' . implode('|', $swForReg) . ')';
        // Split and combine:
        $parts = preg_split('/' . $regExString . '/i', ' ' . $str . ' ', 20000, PREG_SPLIT_DELIM_CAPTURE);
        // Constants:
        $summaryMax = $this->settings['markupSW_summaryMax'];
        $postPreLgd = $this->settings['markupSW_postPreLgd'];
        $postPreLgd_offset = $this->settings['markupSW_postPreLgd_offset'];
        $divider = $this->settings['markupSW_divider'];
        $occurencies = (count($parts) - 1) / 2;
        if ($occurencies) {
            $postPreLgd = MathUtility::forceIntegerInRange($summaryMax / $occurencies, $postPreLgd, $summaryMax / 2);
        }
        // Variable:
        $summaryLgd = 0;
        $output = [];
        // Shorten in-between strings:
        foreach ($parts as $k => $strP) {
            if ($k % 2 == 0) {
                // Find length of the summary part:
                $strLen = $GLOBALS['TSFE']->csConvObj->strlen('utf-8', $parts[$k]);
                $output[$k] = $parts[$k];
                // Possibly shorten string:
                if (!$k) {
                    // First entry at all (only cropped on the frontside)
                    if ($strLen > $postPreLgd) {
                        $output[$k] = $divider . preg_replace('/^[^[:space:]]+[[:space:]]/', '', $GLOBALS['TSFE']->csConvObj->crop('utf-8', $parts[$k], -($postPreLgd - $postPreLgd_offset)));
                    }
                } elseif ($summaryLgd > $summaryMax || !isset($parts[$k + 1])) {
                    // In case summary length is exceed OR if there are no more entries at all:
                    if ($strLen > $postPreLgd) {
                        $output[$k] = preg_replace('/[[:space:]][^[:space:]]+$/', '', $GLOBALS['TSFE']->csConvObj->crop('utf-8', $parts[$k], ($postPreLgd - $postPreLgd_offset))) . $divider;
                    }
                } else {
                    if ($strLen > $postPreLgd * 2) {
                        $output[$k] = preg_replace('/[[:space:]][^[:space:]]+$/', '', $GLOBALS['TSFE']->csConvObj->crop('utf-8', $parts[$k], ($postPreLgd - $postPreLgd_offset))) . $divider . preg_replace('/^[^[:space:]]+[[:space:]]/', '', $GLOBALS['TSFE']->csConvObj->crop('utf-8', $parts[$k], -($postPreLgd - $postPreLgd_offset)));
                    }
                }
                $summaryLgd += $GLOBALS['TSFE']->csConvObj->strlen('utf-8', $output[$k]);
                // Protect output:
                $output[$k] = htmlspecialchars($output[$k]);
                // If summary lgd is exceed, break the process:
                if ($summaryLgd > $summaryMax) {
                    break;
                }
            } else {
                $summaryLgd += $GLOBALS['TSFE']->csConvObj->strlen('utf-8', $strP);
                $output[$k] = '<strong class="tx-indexedsearch-redMarkup">' . htmlspecialchars($parts[$k]) . '</strong>';
            }
        }
        // Return result:
        return implode('', $output);
    }

}