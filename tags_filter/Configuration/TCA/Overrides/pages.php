<?php

defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:';
$configuration = \GeorgRinger\News\Utility\EmConfiguration::getSettings();
$tempColumns = [
    'tagsFilter' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => $ll . 'tx_news_domain_model_news.tags',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'tx_news_domain_model_tag',
            'MM' => 'tx_tagsfilter_page_tag_mm',
            'foreign_table' => 'tx_news_domain_model_tag',
            'foreign_table_where' => 'ORDER BY tx_news_domain_model_tag.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 99,
            'wizards' => [
                '_PADDING' => 2,
                '_VERTICAL' => 1,
                'suggest' => [
                    'type' => 'suggest',
                    'default' => [
                        'searchWholePhrase' => true,
                        'receiverClass' => \GeorgRinger\News\Hooks\SuggestReceiver::class
                    ],
                ],
                'list' => [
                    'type' => 'script',
                    'title' => $ll . 'tx_news_domain_model_news.tags.list',
                    'icon' => 'actions-system-list-open',
                    'params' => [
                        'table' => 'tx_news_domain_model_tag',
                        'pid' => $configuration->getTagPid(),
                    ],
                    'module' => [
                        'name' => 'wizard_list',
                    ],
                ],
                'edit' => [
                    'type' => 'popup',
                    'title' => $ll . 'tx_news_domain_model_news.tags.edit',
                    'module' => [
                        'name' => 'wizard_edit',
                    ],
                    'popup_onlyOpenIfSelected' => 1,
                    'icon' => 'actions-open',
                    'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                ],
            ],
        ],
    ],

    'college' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'college',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'fe_users',
            'MM' => 'tx_tagsfilter_page_college_mm',
            'foreign_table' => 'fe_users',
            'foreign_table_where' => 'ORDER BY fe_users.name',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 99,
            'wizards' => [
                '_PADDING' => 2,
                '_VERTICAL' => 1,
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    $tempColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;' . 'tags, tagsFilter,' .'--div--;' . 'colleges, college'
);