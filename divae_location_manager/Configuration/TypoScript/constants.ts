
plugin.tx_divaelocationmanager_divaelocationmanager {
  view {
    # cat=plugin.tx_divaelocationmanager_divaelocationmanager/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:divae_location_manager/Resources/Private/Templates/
    # cat=plugin.tx_divaelocationmanager_divaelocationmanager/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:divae_location_manager/Resources/Private/Partials/
    # cat=plugin.tx_divaelocationmanager_divaelocationmanager/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:divae_location_manager/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_divaelocationmanager_divaelocationmanager//a; type=string; label=Default storage PID
    storagePid = 50
  }

  settings{
    jobListPid = 42
    jobDetailPid = 122
  }
}
