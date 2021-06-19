<?php

namespace Anax\Controller;

use Anax\Model\GeoLocationAPI;
use Anax\Model\GetGlobalVariables;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

class IpAddressLocationController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : object
    {
        ### General things
        $title = "Ip Address Location"; // title of the page
        $page = $this->di->get("page");
        $req = $this->di->request;

        # Get classes from Model
        $geoLocationApi = new GeoLocationAPI();
        $globalServerValue = new GetGlobalVariables();
        $ipValidate = new IpValidate();

        # get the users ip address from class models supervariable
        $clientIPAddress = $globalServerValue->getServerIpAddress();

        // get the entered value from user
        $ipAddress = $req->getPost('ipaddress');


        // show default user IP values OR entered IP value
        if ($ipAddress) {
            $choosenIpAddress = $ipAddress;
        } else {
            $choosenIpAddress = $clientIPAddress;
        }

        // set all values depending on which ip address the user has choosen
        $location = $geoLocationApi->getLocation($choosenIpAddress);

        $data = [
         "clientIPAddress" => $choosenIpAddress,
         "hostname" => $ipValidate->getIpHostName($choosenIpAddress),
         "iptype" => $ipValidate->getIpType($choosenIpAddress),
         "country" =>  $location["country_name"],
         "longitude" => $location["longitude"],
         "latitude" => $location["latitude"],
        ];

        ### add a view and send $data to that page
        # this is the folder and what file the view code is in
        $page->add("ipaddress/iplocation", $data);

        return $page->render(["title" => $title]);
    }
}
