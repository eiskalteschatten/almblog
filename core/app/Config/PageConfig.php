<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class PageConfig {
    public const PAGES = [
        "home" => [
            "inMainNav" => true,
            "inFooterNav" => true,
            "mainNavTitle" => "Home"
        ],
        "about" => [
            "title" => "About",
            "inMainNav" => true,
            "inFooterNav" => true,
            "mainNavTitle" => "About"
        ],
        // "deeper/test" => [
        //     "title" => "Test Page 2",
        //     "scripts" => [
        //         ["testscripts.js", "defer"]
        //     ],
        //     "styles" => ["teststyles.css"],
        //     "inMainNav" => true,
        //     "mainNavTitle" => "Test Page 2"
        // ],
        "404" => [
            "title" => "Page Not Found"
        ]
    ];
}
