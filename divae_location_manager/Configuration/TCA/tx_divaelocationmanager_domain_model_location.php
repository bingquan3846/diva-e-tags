<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'name,zip,city,street,latitude,longitude,tel,fax,email',
        'iconfile' => 'EXT:divae_location_manager/Resources/Public/Icons/tx_divaelocationmanager_domain_model_location.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, zip, city, street, latitude, longitude, tel, fax, email',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, zip, city, street, latitude, longitude, tel, fax, email, page, pics,   --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime, --div--; Advantages, advantage, --div--; Jobs, jobs, jobsnumber'],
    ],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_divaelocationmanager_domain_model_location',
                'foreign_table_where' => 'AND tx_divaelocationmanager_domain_model_location.pid=###CURRENT_PID### AND tx_divaelocationmanager_domain_model_location.sys_language_uid IN (-1,0)',
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
            ],
        ],
		'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'name' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'zip' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.zip',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'city' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.city',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'street' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.street',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'latitude' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.latitude',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'longitude' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.longitude',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'tel' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.tel',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'fax' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.fax',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'email' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],

		'jobsnumber' => [
			'exclude' => true,
			'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.jobnumber',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],

		'advantage' =>  [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.advantage',
			'config' => [
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_tagsfilter_domain_model_advantage',
				'MM' => 'tx_divaelocationmanager_location_advantage_mm',
				'foreign_table' => 'tx_tagsfilter_domain_model_advantage',
				'foreign_table_where' => 'ORDER BY tx_tagsfilter_domain_model_advantage.title',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 99,
				'wizards' => [
					'_PADDING' => 2,
					'_VERTICAL' => 1,
				],
			],
		],
		'jobs' =>  [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.jobs',
			'config' => [
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_divaelocationmanager_domain_model_job',
				'MM' => 'tx_divaelocationmanager_job_location_mm',
				'MM_opposite_field' => 'jobs',
				'foreign_table' => 'tx_divaelocationmanager_domain_model_job',
				'foreign_table_where' => 'ORDER BY tx_divaelocationmanager_domain_model_job.title ASC',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 99,
				'wizards' => [
					'_PADDING' => 2,
					'_VERTICAL' => 1,
				],
			],
		],

		'page' => [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.page',
			'config' => [
				'type' => 'input',
				'size' => '30',
				'softref' => 'typolink',
				'wizards' => [
					'_PADDING' => 2,
					'link' => [
						'type' => 'popup',
						'title' => 'Page',
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

		'pics' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_location.pics',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'pics',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
					],
					'foreign_types' => [
						'0' => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						]
					],
					'maxitems' => 3
				],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		],
	],
];
