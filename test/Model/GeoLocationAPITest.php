<?php

namespace Anax\Model;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the Anax/Model/GeoLocationAPI class Model.
 */
class GeoLocationAPITest extends TestCase
{

    /**
     * Test the getLocation model class function.
     * Get back the correct ip type when entered googles ip
     */
    public function testGetLocationModelClass()
    {
         # getting the token from .env file
         $token = "ae0e35ba3013a4fb54fd299c8f32f0c3";

         $controller = new GeoLocationAPI();
         $res = $controller->getLocation("8.8.8.8", $token);
         $this->assertEquals(true, is_array($res));
    }

     /**
      * Test the getLocation model class function.
      * Get back the correct ip type when entered googles ip
      * From curl!
      */
    public function testgetGeoLocationThroughCurl()
    {
          $controller = new GeoLocationAPI();
          $res = $controller->getGeoLocationThroughCurl("8.8.8.8");
          $this->assertEquals(true, is_array($res));
    }
}
