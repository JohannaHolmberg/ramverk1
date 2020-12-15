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
class IpAddressController implements ContainerInjectableInterface
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
         $title = "Validera IP adress"; // title of the page
         $page = $this->di->get("page");
         $ipValidate = new IpValidate();

         // get the entered value from user
         $ipAddress = $this->di->request->getPost('ipaddress');

         // collect all the variables to be sent to the view
         $data = [
             //"content" => "HELLO A"
             "ipAddress" => $ipAddress,
             "hostname" => $ipValidate->getIpHostName($ipAddress),
             "iptype" => $ipValidate->getIpType($ipAddress)
         ];

         $page->add("ipaddress/validateip", $data);

         return $page->render(["title" => $title]);
    }
}
