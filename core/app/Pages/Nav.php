<?php
declare(strict_types=1);

namespace AlmBlog\Pages;

use AlmBlog\Config\AppConfig;
use AlmBlog\Core\Router;

class Nav {
    public static function get_active_css_class(string $key): string {
        $is_active = Router::$page_key === $key;
        return $is_active ? " active" : "";
    }
}
