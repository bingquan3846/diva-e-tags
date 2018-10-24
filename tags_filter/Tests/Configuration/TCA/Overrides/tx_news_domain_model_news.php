<?php

defined('TYPO3_MODE') or die();


$tempColumns = [
    'college' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'college',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'fe_users',
            'MM' => 'tx_tagsfilter_news_college_mm',
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

    'location' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'location',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_news_domain_model_news',
    $tempColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    '--div--;' . 'Colleges, college,' . '--div--;' . 'Event, location'
);


$GLOBALS['TCA']['tx_news_domain_model_news']['grid']['excluded_fields'] =  'tags, fal_media,fal_related_files,college';


