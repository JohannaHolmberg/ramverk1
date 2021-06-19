<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Anax\DI\DIMagic;

/**
 * Test the SampleController.
 */
class IpAddressLocationControllerTest extends TestCase
{
    // Create the di container.
    protected $di;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache/anax");

        # set the mock  as a service to override  the existing ones
        # service into $di

        //$di->setShared("Anax\Model\GetGlobalVariables","Anax\Mock\MockGlobalVariables");
        $di->setShared("Anax\Model\GetGlobalVariables", "Anax\Mock\MockGlobalVariables");
        $this->di = $di;

        $this->controller = new IpAddressLocationController();
        $this->controller->setDI($this->di);
    }


    public function testindexAction()
    {


        // Test the controller action
        $res = $this->controller->indexAction();

        $body = $res->getBody();
        //$this->assertIsString($body);
        $this->assertStringContainsString("ipaddress", $body);
    }
}
