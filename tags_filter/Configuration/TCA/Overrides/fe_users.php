<?php

defined('TYPO3_MODE') or die();


$tempColumn = [
    'position' => [
        'exclude' => 1,
        'label' =>  'Position',
        'config' => [
            'type' => 'input',
            'size' => 30,
        ]
    ],

    'quotation' => [
        'exclude' => 1,
        'label' => 'Quotation',
        'config' => [
            'type' => 'text',
            'cols' => 40,
            'rows' => 15,
            'eval' => 'trim'
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'fe_users',
    $tempColumn
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    '--div--;' . 'Position, position, quotation'
);