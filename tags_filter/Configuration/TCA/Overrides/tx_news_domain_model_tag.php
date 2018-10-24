<?php

defined('TYPO3_MODE') or die();

$tempColumns = [
    'link' => [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'page',
        'config' => [
            'type' => 'input',
            'size' => '30',
            'softref' => 'typolink',
            'wizards' => [
                '_PADDING' => 2,
                'link' => [
                    'type' => 'popup',
                    'title' => 'Link',
                    'module' => [
                        'name' => 'wizard_element_browser',
                        'urlParameters' => [
                            'mode' => 'wizard'
                        ] ,
                    ] ,
                    'JSopenParams' => 'height=600,width=500,status=0,menubar=0,scrollbars=1'
                ],
            ],
        ]
    ],
    'service' => [
    'exclude' => 1,
    'l10n_mode' => 'mergeIfNotBlank',
    'label' => 'service',
    'config' => [
        'type' => 'group',
        'internal_type' => 'db',
        'allowed' => 'tx_tagsfilter_domain_model_service',
        'size' => 1,
        'maxitems' => 1,
        'minitems' => 0,
        'show_thumbs' => 1,
        'default' => 0,
        'wizards' => [
            'suggest' => [
                'type' => 'suggest',
                'default' => [
                    'searchWholePhrase' => true
                ]
            ],
        ],
    ]
]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_news_domain_model_tag',
    $tempColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_tag',
    '--div--;Link, service'
);