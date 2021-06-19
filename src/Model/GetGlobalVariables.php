<?php

namespace Anax\Model;

/**
 * A model class retrievieng data from global variables / "superglobals".
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class GetGlobalVariables
{
    public function getServerIpAddress() : string
    {
        $clientIPAddress = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
        //$clientIPAddress = $_SERVER['REMOTE_ADDR'];
        return $clientIPAddress;
    }
}
