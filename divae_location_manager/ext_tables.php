<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Divae.DivaeLocationManager',
            'Divaelocationmanager',
            'Location Manager'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Divae.DivaeLocationManager',
            'Ajaxlocations',
            'Locations'
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Divae.DivaeLocationManager',
            'Detaillocation',
            'Detail Page for Location'
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Divae.DivaeLocationManager',
            'Jobscount',
            'Amount of jobs'
        );

        $pluginSignature = str_replace('_', '', $extKey) . '_divaelocationmanager';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $extKey . '/Configuration/FlexForms/flexform_divaelocationmanager.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Location Manager');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_divaelocationmanager_domain_model_location', 'EXT:divae_location_manager/Resources/Private/Language/locallang_csh_tx_divaelocationmanager_domain_model_location.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_divaelocationmanager_domain_model_location');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_divaelocationmanager_domain_model_job', 'EXT:divae_location_manager/Resources/Private/Language/locallang_csh_tx_divaelocationmanager_domain_model_job.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_divaelocationmanager_domain_model_job');

    },
    $_EXTKEY
);
