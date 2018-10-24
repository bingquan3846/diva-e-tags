<?php
namespace Divae\DivaeLocationManager\Controller;

/***
 *
 * This file is part of the "Location Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * LocationController
 * @package divae_location_manager
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * locationRepository
     *
     * @var \Divae\DivaeLocationManager\Domain\Repository\LocationRepository
     * @inject
     */
    protected $locationRepository;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $this->locationRepository->setDefaultOrderings(['city' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        $locations = $this->locationRepository->findAll();

        $this->view->assign('locations', $locations );

        $content = $this->configurationManager->getContentObject();
        $this->view->assign('mode', $content->data['select_key']);
    }


    /**
     * show the advantages and jobs in detail page of location
     */
    public function showAction()
    {
        $pageUid = $GLOBALS['TSFE']->id;

        $location = $this->locationRepository->findOneByPage($pageUid);

        $this->view->assign('location', $location);

    }

    /**
     * return json of all locations for map display
     */
    public function ajaxAction()
    {

        $locations = $this->locationRepository->findAll();

        $markers['markers']= [];

        if($locations->count()){
            $i = 0;
            $uriBuilder = $this->controllerContext->getUriBuilder();
            foreach($locations as $location)
            {
                if($i == 0){
                    $array = ['mainMarker' => true, 'lat' => $location->getLatitude(), 'lng' => $location->getLongitude(), 'markerId' => $location->getUid(),
                        'tooltipBox' => ['company'=>$location->getName(), 'name' => $location->getCity(), 'address' => $location->getStreet(), 'zip' => $location->getZip(), 'phone' => $location->getTel(), 'mail' => $location->getEmail(), 'contact' => $uriBuilder->setTargetPageUid($location->getPage())->buildFrontendUri()]];
                }else{
                    $array = [ 'lat' => $location->getLatitude(), 'lng' => $location->getLongitude(), 'markerId' => $location->getUid(),
                        'tooltipBox' => ['company'=>$location->getName(), 'name' => $location->getCity(), 'address' => $location->getStreet(), 'zip' => $location->getZip(), 'phone' => $location->getTel(), 'mail' => $location->getEmail(), 'contact' => $uriBuilder->setTargetPageUid($location->getPage())->buildFrontendUri()]];
                }

                array_push($markers['markers'], $array);
                $i++;

            }
        }
        $this->view->assign('locations', json_encode($markers));

    }
}
