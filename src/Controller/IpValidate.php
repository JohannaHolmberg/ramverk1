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
class IpValidate implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function getIpType($ipAddress) : string
    {
        $ipType = "";

        if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            // var_dump("$ipAddress is a valid IP 4 address");
            $ipType = "IP 4";
        } elseif (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // var_dump("$ipAddress is a valid IP 6 address");
            $ipType = "IP 6";
        } else {
            // var_dump("not an ip4 or ip6");
            //$ipType = "Inte giltlig IP 4 eller I P6";
        }
        return $ipType;
    }

    public function getIpHostName($ipAddress) : string
    {
        $hostname = "";

        if ($ipAddress) {
            $hostname = gethostbyaddr($ipAddress);
        }
        return $hostname;
    }

    public function getJsonData($ipAddress)
    {
        # Data array to create string url in view
        $data = array('address' => $ipAddress,
                    'hostname' => $this->getIpHostName($ipAddress),
                    'iptype' => $this->getIpType($ipAddress)); # set the adress to a key/value pair array

        # prepare the type of header, method to post and what to send with the POST method.
        # this is what to send to the server/database/localhost ecc.
        $options = array(
         'http' => array(
             'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
             'method'  => 'POST',
             'content' => http_build_query($data) # returns an url-encoded string ex 'address=8.8.8.8'
         )
        );

        $result = json_encode($options);
        return $result;
    }
}
