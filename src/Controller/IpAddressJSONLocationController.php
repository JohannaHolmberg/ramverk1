<?php

namespace Anax\Controller;

use Anax\Model\GeoLocationAPI;
use Anax\Model\GetGlobalVariables;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

class IpAddressJSONLocationController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : object
    {
        ### General things
        $title = "Ip Address Location"; // title of the page
        $page = $this->di->get("page");
        $req = $this->di->request;
        $globalServerValue = new GetGlobalVariables();
        $curlLocation = new GeoLocationAPI(); // the model where I get the API and Curl- rename

        // get the ipadressen from the post form
        $ipAddress = $req->getPost('ipaddress');
        $ipAddressTest = $req->getPost('ipaddressTest');

        // if statement to determine which ip address to get from the API
        if ($ipAddress) {
            $clientIPAddress = $ipAddress;
        } elseif ($ipAddressTest) {
            $clientIPAddress = $ipAddressTest;
        } else {
            $clientIPAddress = $globalServerValue->getServerIpAddress();
        }

        $location = $curlLocation->getGeoLocationThroughCurl($clientIPAddress); // the function with curl - rename

        $data = [
            "content" => json_encode($location, JSON_PRETTY_PRINT)
        ];

        ### add a view and send $data to that page
        # this is the folder and what file the view code is in
        $page->add("ipaddress/iplocationjson", $data);

        return $page->render(["title" => $title]);
    }
}
