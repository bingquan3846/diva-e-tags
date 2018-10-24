<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'sortby' => 'publication_date',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'title,type,position,duration,department,publication_date,task_headline,task_text,employer_headline,employer_text,workplace_headline,workplace_text,requirement_headline,requirement_text,process_headline,process_text,contact_headline,contact_text,job_number,form_link,state,locations',
        'iconfile' => 'EXT:divae_location_manager/Resources/Public/Icons/tx_divaelocationmanager_domain_model_job.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, type, position, duration, department, publication_date, task_headline, task_text, employer_headline, employer_text, workplace_headline, workplace_text, requirement_headline, requirement_text, process_headline, process_text, contact_headline, contact_text, job_number, form_link, state, locations',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, type, position, duration, department, publication_date, task_headline, task_text, employer_headline, employer_text, workplace_headline, workplace_text, requirement_headline, requirement_text, process_headline, process_text, contact_headline, contact_text, job_number, form_link, state, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime, --div--;Locations, locations'],
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
                'foreign_table' => 'tx_divaelocationmanager_domain_model_job',
                'foreign_table_where' => 'AND tx_divaelocationmanager_domain_model_job.pid=###CURRENT_PID### AND tx_divaelocationmanager_domain_model_job.sys_language_uid IN (-1,0)',
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
        'title' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'type' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.type',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'position' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.position',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'duration' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.duration',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'department' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.department',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'publication_date' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.publication_date',
	        'config' => [
			    'dbType' => 'date',
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => '0000-00-00'
			],
	    ],
	    'task_headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.task_headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'task_text' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.task_text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			],
            'defaultExtras' => 'richtext[]'
        ],
	    'employer_headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.employer_headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'employer_text' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.employer_text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			],
            'defaultExtras' => 'richtext[]'
	    ],
	    'workplace_headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.workplace_headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'workplace_text' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.workplace_text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			],
            'defaultExtras' => 'richtext[]'
	    ],
	    'requirement_headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.requirement_headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'requirement_text' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.requirement_text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			],
            'defaultExtras' => 'richtext[]'
	    ],
	    'process_headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.process_headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'process_text' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.process_text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			],
            'defaultExtras' => 'richtext[]'
	    ],
	    'contact_headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.contact_headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'contact_text' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.contact_text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			],
            'defaultExtras' => 'richtext[]'
	    ],
	    'job_number' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.job_number',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	    'form_link' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.form_link',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'state' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.state',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'locations' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:divae_location_manager/Resources/Private/Language/locallang_db.xlf:tx_divaelocationmanager_domain_model_job.locations',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectMultipleSideBySide',
			    'foreign_table' => 'tx_divaelocationmanager_domain_model_location',
			    'MM' => 'tx_divaelocationmanager_job_location_mm',
			    'size' => 10,
			    'autoSizeMax' => 30,
			    'maxitems' => 9999,
			    'multiple' => 0,
			    'wizards' => [
			        '_PADDING' => 1,
			        '_VERTICAL' => 1,
			        'edit' => [
			            'module' => [
			                'name' => 'wizard_edit',
			            ],
			            'type' => 'popup',
			            'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
			            'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
			            'popup_onlyOpenIfSelected' => 1,
			            'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
			        ],
			        'add' => [
			            'module' => [
			                'name' => 'wizard_add',
			            ],
			            'type' => 'script',
			            'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
			            'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
			            'params' => [
			                'table' => 'tx_divaelocationmanager_domain_model_location',
			                'pid' => '###CURRENT_PID###',
			                'setValue' => 'prepend'
			            ],
			        ],
			    ],
			],
	    ],
    ],
];
