<?php

namespace Anax\Model;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the Anax/Model/GeoLocationAPI class Model.
 */
class GetGlobalVariablesTest extends TestCase
{
    public function testgetServerIpAddress()
    {
         $controller = new GetGlobalVariables();
         $res = $controller->getServerIpAddress();
         $this->assertEquals(true, is_string($res));
    }
}
