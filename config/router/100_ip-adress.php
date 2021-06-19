<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Validera IP adress",
            "mount" => "ipaddress/validateip",
            "handler" => "\Anax\Controller\IpAddressController",
        ],
        [
            "info" => "Validera JSON IP adress",
            "mount" => "ipaddress/validateJSONip",
            "handler" => "\Anax\Controller\IpAddressJSONController",
        ],
        [
            "info" => "Ip Address Location",
            "mount" => "ipaddress/iplocation",
            "handler" => "\Anax\Controller\IpAddressLocationController",
        ],
        [
            "info" => "Ip Address Location JSON",
            "mount" => "ipaddress/iplocationjson",
            "handler" => "\Anax\Controller\IpAddressJSONLocationController",
        ]
    ]
];
