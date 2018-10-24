<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Divae.DivaeLocationManager',
            'Divaelocationmanager',
            [
                'Location' => 'list, show',
                'Job' => 'list, show, search'
            ],
            // non-cacheable actions
            [
                'Location' => '',
                'Job' => 'search'
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Divae.DivaeLocationManager',
            'Ajaxlocations',
            [
                'Location' => 'ajax',
            ],
            // non-cacheable actions
            [
                'Location' => 'ajax',
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Divae.DivaeLocationManager',
            'Detaillocation',
            [
                'Location' => 'show',
            ],
            // non-cacheable actions
            [
                'Location' => 'show',
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Divae.DivaeLocationManager',
            'Jobcount',
            [
                'Job' => 'count',
            ],
            // non-cacheable actions
            [
                'Job' => 'count',
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					divaelocationmanager {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_divaelocationmanager.svg
						title = LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divae_location_manager_domain_model_divaelocationmanager
						description = LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divae_location_manager_domain_model_divaelocationmanager.description
						tt_content_defValues {
							CType = list
							list_type = divaelocationmanager_divaelocationmanager
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
