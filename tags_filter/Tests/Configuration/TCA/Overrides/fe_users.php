<?php

defined('TYPO3_MODE') or die();


$positionColumn = [
    'position' => [
        'exclude' => 1,
        'label' =>  'position',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'fe_users',
    $positionColumn
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    '--div--;' . 'position, position'
);