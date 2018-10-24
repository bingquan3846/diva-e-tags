<?php

$ll = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:';
$configuration = \GeorgRinger\News\Utility\EmConfiguration::getSettings();

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_reference',
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
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,pics,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tags_filter') . 'Resources/Public/Icons/tx_tagsfilter_domain_model_reference.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, teaser,  description, pics, tags',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, teaser,  description, pics, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime,--div--;Tags, tags, --div--;categories, categories, --div--;Colleges, colleges'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_tagsfilter_domain_model_reference',
				'foreign_table_where' => 'AND tx_tagsfilter_domain_model_reference.pid=###CURRENT_PID### AND tx_tagsfilter_domain_model_reference.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_reference.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),

		'teaser' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_reference.teaser',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),

		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_reference.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
			'defaultExtras' => 'richtext[]'
		),
		'pics' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tags_filter/Resources/Private/Language/locallang_db.xlf:tx_tagsfilter_domain_model_reference.pics',
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

		'tags' =>  [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => $ll . 'tx_news_domain_model_news.tags',
			'config' => [
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_news_domain_model_tag',
				'MM' => 'tx_tagsfilter_reference_tag_mm',
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
					'tablenames' => 'tx_tagsfilter_domain_model_reference',
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
				'MM' => 'tx_tagsfilter_reference_college_mm',
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
		
	),
);