<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Anax\DI\DIMagic;

/**
 * Test the SampleController.
 */
class IpAddressLocationControllerJSONTest extends TestCase
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
        $di->setShared("Anax\Model\GetGlobalVariables", "Anax\Mock\MockGlobalVariables");
        $this->di = $di;
    }

    public function testindexAction()
    {
        $controller = new IpAddressLocationController();
        $controller->setDI($this->di);

        // Test the controller action
        $res = $controller->indexAction();

        $body = $res->getBody();
        // $this->assertIsString($body);
        $this->assertStringContainsString("ipaddress", $body);

        // $output = $this->request('GET', ['indexAction']);
        // $expected = '<h2>Ip adress location<h2>';
        //
        // $this->assertContains($expected, $output);
    }
}
