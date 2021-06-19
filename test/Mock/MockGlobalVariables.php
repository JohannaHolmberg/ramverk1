<?php

namespace Anax\Mock;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

use Anax\Model\GetGlobalVariables;

 /**
  * Mock Test the Anax/Model/GetGlobalVariables class Model.
  */
class MockGlobalVariables extends GetGlobalVariables
{
    public function getServerIpAddress() : string
    {
        $clientIPAddress = '::1';
        return $clientIPAddress;
    }
}
