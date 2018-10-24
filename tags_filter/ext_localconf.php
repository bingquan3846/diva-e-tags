<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}



\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Divae.' . $_EXTKEY,
	'Reference',
	array(
		'Index' => 'references',
		'Ajax'  => 'showReference'

	),
	// non-cacheable actions
	array(
		'Ajax'  => 'showReference'
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Divae.' . $_EXTKEY,
	'Serviceslist',
	array(
		'Index' => 'services, servicesInMenu ',

	),
	// non-cacheable actions
	array(

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Divae.' . $_EXTKEY,
	'Showservice',
	array(
		'Index' => 'showService',

	),
	// non-cacheable actions
	array(

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Divae.' . $_EXTKEY,
	'Casestudy',
	array(
		'CaseStudy' => 'show',

	),
	array(

	)
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Divae.' . $_EXTKEY,
	'Homebanner',
	array(
		'CaseStudy' => 'homeBanner',

	),
	array(
		'CaseStudy' => 'homeBanner',
	)
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Divae.' . $_EXTKEY,
	'Eventregister',
	array(
		'EventUser' => 'registerEvent',

	),
	array(
		'EventUser' => 'registerEvent',
	)
);


// override the default text for news tag in backend
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['default']['EXT:news/Resources/Private/Language/locallang_db.xlf'][] = 'EXT:tags_filter/Resources/Private/Language/News/locallang_db.xlf';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = 'Divae\\TagsFilter\\Command\\JobsImportCommandController';

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['pi1_hooks']['getDisplayResults'] = 'Divae\\TagsFilter\\Service\\Search';