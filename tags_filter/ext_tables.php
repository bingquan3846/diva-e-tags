<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Reference',
	'Reference '
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Serviceslist',
	'Services list '
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Showservice',
	'Show service '
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Casestudy',
	'Show Case Study'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Homebanner',
	'Show home video banner'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Eventregister',
	'Register for one event from news detail'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Tags Filter');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tagsfilter_domain_model_reference', 'EXT:tags_filter/Resources/Private/Language/locallang_csh_tx_tagsfilter_domain_model_reference.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tagsfilter_domain_model_reference');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tagsfilter_domain_model_job', 'EXT:tags_filter/Resources/Private/Language/locallang_csh_tx_tagsfilter_domain_model_job.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tagsfilter_domain_model_job');



$pluginSignature = 'tagsfilter_serviceslist';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:tags_filter/Configuration/flexform.xml');
