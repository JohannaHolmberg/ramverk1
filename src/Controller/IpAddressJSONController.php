<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IpAddressJSONController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return string
     */
    public function indexAction() : object
    {
        ### General things
        $title = "Validera JSON IP adress"; // title of the page
        $page = $this->di->get("page");
        $request = $this->di->request;
        $ipValidate = new IpValidate();

        $data = [
         "ipAddress" => $ipValidate->getJsonData($request->getPost('ipJSONaddress')),
         "ipAddressTest" => $ipValidate->getJsonData($request->getPost('ipJSONaddressTest'))
        ];

        ### add a view and send $data to that page
        # this is the folder and what file the view code is in
        $page->add("ipaddress/validateJSONip", $data);
        return $page->render(["title" => $title]);
    }
}
