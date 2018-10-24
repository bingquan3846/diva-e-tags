
plugin.tx_divaelocationmanager_divaelocationmanager {

        view {
            templateRootPaths.0 = EXT:divae_location_manager/Resources/Private/Templates/
            templateRootPaths.1 = {$plugin.tx_divaelocationmanager_divaelocationmanager.view.templateRootPath}
            partialRootPaths.0 = EXT:divae_location_manager/Resources/Private/Partials/
            partialRootPaths.1 = {$plugin.tx_divaelocationmanager_divaelocationmanager.view.partialRootPath}
            layoutRootPaths.0 = EXT:divae_location_manager/Resources/Private/Layouts/
            layoutRootPaths.1 = {$plugin.tx_divaelocationmanager_divaelocationmanager.view.layoutRootPath}
        }

        persistence {
            storagePid = {$plugin.tx_divaelocationmanager_divaelocationmanager.persistence.storagePid}
            #recursive = 1
        }

        features {
            #skipDefaultArguments = 1
        }

        mvc {
            #callDefaultActionIfActionCantBeResolved = 1
        }

        settings{
            jobListPid = {$plugin.tx_divaelocationmanager_divaelocationmanager.settings.jobListPid}
            jobDetailPid = {$plugin.tx_divaelocationmanager_divaelocationmanager.settings.jobDetailPid}
        }
}

plugin.tx_divaelocationmanager._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-divae-location-manager table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-divae-location-manager table th {
        font-weight:bold;
    }

    .tx-divae-location-manager table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
