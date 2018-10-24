<?php

$ll = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:';
$configuration = \GeorgRinger\News\Utility\EmConfiguration::getSettings();

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,
        'versioningWS' => 2,
        'versioning_followPages' => TRUE,

        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
       ],
        'searchFields' => 'title,description,pics,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tags_filter') . 'Resources/Public/Icons/tx_tagsfilter_domain_model_service.gif'
   ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, teaser,  description, pics, tags',
   ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title ,teaser, shortdescription, pics, description, advantages, label, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime, --div--; Tags, tags,--div--;categories, categories, --div--; colleges, colleges, --div--; Seo Keywords, keywords'],
   ],
    'palettes' => [
        '1' => ['showitem' => ''],
   ],
    'columns' => [

        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
               ],
           ],
       ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
               ],
                'foreign_table' => 'tx_tagsfilter_domain_model_service',
                'foreign_table_where' => 'AND tx_tagsfilter_domain_model_service.pid=###CURRENT_PID### AND tx_tagsfilter_domain_model_service.sys_language_uid IN (-1,0)',
           ],
       ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
           ],
       ],

        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ]
       ],

        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
           ],
       ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
               ],
           ],
       ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
               ],
           ],
       ],
        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
           ],
       ],
        'teaser' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.teaser',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 10,
                'eval' => 'trim'
            ],
        ],
        'shortdescription' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.shortdescription',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ],
            'defaultExtras' => 'richtext[]'
        ],

        'pics' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.pics',
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
                    'maxitems' => 1
                ),
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ),
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
           ],
            'defaultExtras' => 'richtext[]'
       ],
        'label' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.label',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ],
        ],

        'keywords' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.keywords',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'advantages' =>  [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_service.advantages',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_tagsfilter_domain_model_advantage',
                'MM' => 'tx_tagsfilter_service_advantage_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit',
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ],
                ],
            ],
        ],


        'tags' =>  [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'tx_news_domain_model_news.tags',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_tag',
                'MM' => 'tx_tagsfilter_service_tag_mm',
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

        'categories' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'tx_news_domain_model_news.categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'treeConfig' => [
                    'dataProvider' => \GeorgRinger\News\TreeProvider\DatabaseTreeDataProvider::class,
                    'parentField' => 'parent',
                    'appearance' => [
                        'showHeader' => true,
                        'expandAll' => true,
                        'maxLevels' => 99,
                    ],
                ],
                'MM' => 'sys_category_record_mm',
                'MM_match_fields' => [
                    'fieldname' => 'categories',
                    'tablenames' => 'tx_tagsfilter_domain_model_service',
                ],
                'MM_opposite_field' => 'items',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => ' AND (sys_category.sys_language_uid = 0 OR sys_category.l10n_parent = 0) ORDER BY sys_category.sorting',
                'size' => 30,
                'minitems' => 0,
                'maxitems' => 99,
            ]
        ],

        'colleges' =>  [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'colleges',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'fe_users',
                'MM' => 'tx_tagsfilter_service_college_mm',
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

   ],
];