<?php

defined('TYPO3_MODE') or die();


$tempColumns = [
    'college' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Colleges',
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
        'label' => 'Locations',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'tx_divaelocationmanager_domain_model_location',
            'MM' => 'tx_tagsfilter_news_location_mm',
            'foreign_table' => 'tx_divaelocationmanager_domain_model_location',
            'foreign_table_where' => 'ORDER BY tx_divaelocationmanager_domain_model_location.name',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 99,
            'wizards' => [
                '_PADDING' => 2,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'city' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'City',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],

    'eventtype' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Type',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
    'speaker' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Speaker',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
    'place' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Place',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
    'eventdate' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Event Date',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'date'
        ],
    ],
    'period' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Period',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
    'price' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Price',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
    'eventlanguage' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Language',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],
    'email' =>  [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Email',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ],
    ],

    'speakerimage' => array(
        'exclude' => 1,
        'label' => 'Speaker Image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'pics',
            array(
                'appearance' => array(
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ),
                'foreign_types' => array(
                    '0' => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    )
                ),
                'maxitems' => 3
            ),
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ),
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_news_domain_model_news',
    $tempColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    '--div--;Colleges, college,--div--;Event, city, eventtype, speaker, speakerimage, eventdate, period,  place, price, eventlanguage, email , --div--; Locations, location'
);


$GLOBALS['TCA']['tx_news_domain_model_news']['grid']['excluded_fields'] =  'tags, fal_media,fal_related_files,college';


