<?php
declare(strict_types=1);

namespace AlmBlog\Pages;

use AlmBlog\Config\AppConfig;
use AlmBlog\Config\PageConfig;

class Nav {
    public static function get_active_css_class(string $path): string {
        return PageConfig::$page_config["key"] === $path ? " active" : "";
    }
}
