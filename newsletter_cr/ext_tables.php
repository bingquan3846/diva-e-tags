<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Divae.' . $_EXTKEY,
	'Newslettercr',
	'Newsletter for clever reach'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'newsletter from clever reach');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_newslettercr_domain_model_users', 'EXT:newsletter_cr/Resources/Private/Language/locallang_csh_tx_newslettercr_domain_model_users.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newslettercr_domain_model_users');


$pluginSignature = 'newslettercr_newslettercr';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:newsletter_cr/Configuration/flexform.xml');