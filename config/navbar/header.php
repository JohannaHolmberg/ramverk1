<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
        [
            "text" => "Ip adress",
            "url" => "ipaddress/validateip",
            "title" => "Testa en IP adress.",
        ],
        [
            "text" => "Ip JSON adress",
            "url" => "ipaddress/validateJSONip",
            "title" => "Testa en JSON IP adress.",
        ],
        [
            "text" => "Ip adress location",
            "url" => "ipaddress/iplocation",
            "title" => "Ip adress location",
        ],
        [
            "text" => "Ip adress location JSON",
            "url" => "ipaddress/iplocationjson",
            "title" => "Ip adress location JSON",
        ],
    ],
];
