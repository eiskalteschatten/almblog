<?php
namespace App\Config;

class NavConfig {
    public const MAIN_NAV = [
        [
            "route" => "/",
            "title" => "Home"
        ],
        [
            "route" => "about",
            "title" => "About Me"
        ]
    ];

    public const FOOTER_NAV = [
        [
            "route" => "/",
            "title" => "Home"
        ],
        [
            "route" => "about",
            "title" => "About Me"
        ],
    ];
}
