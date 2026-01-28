<?php
declare(strict_types=1);

namespace AlmBlog\Pages;

use AlmBlog\Config\AppConfig;
use AlmBlog\Config\PageConfig;

class Nav {
    public static function get_active_css_class(string $key): string {
        $is_active = PageConfig::$page_key === $key;
        return $is_active ? " active" : "";
    }
}
