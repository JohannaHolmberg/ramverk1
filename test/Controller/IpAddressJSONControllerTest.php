<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpAddressJSONControllerTest extends TestCase
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
        $di = new \Anax\DI\DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache/anax");

        $this->di = $di;
    }


    public function testindexAction()
    {
        $controller = new IpAddressJSONController();
        $controller->setDI($this->di);

        // Test the controller action
        $res = $controller->indexAction();

        $body = $res->getBody("ipJSONaddress");
        $this->assertIsString($body);
    }
}
