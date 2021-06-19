<?php

namespace Anax\Model;

use DevCoder\DotEnv;

/**
 * A model class retrievieng data from an external server.
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class GeoLocationAPI
{

    public function getLocation($ipAddress) : array
    {
        $token = "ae0e35ba3013a4fb54fd299c8f32f0c3";//$_ENV['TOKEN'];

        $url = "http://api.ipstack.com/$ipAddress?access_key=$token";
        $res = file_get_contents($url);
        $user = json_decode($res, true);
        return $user;
    }

    public function getGeoLocationThroughCurl($ipAddressCurl) : array
    {
        $token = "ae0e35ba3013a4fb54fd299c8f32f0c3";//$_ENV['TOKEN'];
        $url = "http://api.ipstack.com/$ipAddressCurl?access_key=$token";

        //  Initiate curl handler
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $data = curl_exec($ch);

        // Closing
        curl_close($ch);

        $user = json_decode($data, true);
        return $user;
    }
}
