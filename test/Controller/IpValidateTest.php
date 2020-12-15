<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpValidateTest extends TestCase
{
    /**
     * Test return correct IP 4 type of ip address
     */
    public function testIPv4ValidationControll()
    {
        $controller = new IpValidate();
        $res = $controller->getIpType("8.8.8.8");
        $this->assertEquals("IP 4", $res);
    }

    /**
     * Test return correct IP 6 type of ip address
     */
    public function testIPv6ValidationControll()
    {
        $controller = new IpValidate();
        $res = $controller->getIpType("2001:0db8:0000:0000:0000:ff00:0042:7879");
        $this->assertEquals("IP 6", $res);
    }


    /**
     * Test return correct IP 6 type of ip address
     */
    public function testHostNameResponse()
    {
        $controller = new IpValidate();
        $res = $controller->getIpHostName("8.8.8.8");
        $this->assertEquals("dns.google", $res);
    }


    /**
     * Test return correct json sting is returned
     * for 8.8.8.8 Ip address
     */
    public function testGetJsonDataFromIp()
    {
        $controller = new IpValidate();
        $res = $controller->getJsonData("8.8.8.8");
        $expectedResult = '{"http":{"header":"Content-type: application\/x-www-form-urlencoded\r\n","method":"POST","content":"address=8.8.8.8&hostname=dns.google&iptype=IP+4"}}';
        $this->assertEquals($expectedResult, $res);
    }
}
