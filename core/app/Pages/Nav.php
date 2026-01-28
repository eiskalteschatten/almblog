<?php
declare(strict_types=1);

namespace AlmBlog\Pages;

use AlmBlog\Config\AppConfig;

class Nav {
    public static function get_active_css_class(string $path): string {
        $current_uri = substr($_SERVER["REQUEST_URI"], 1);
        $current_uri = rtrim($current_uri, '/');
        return $current_uri === $path ? " active" : "";
    }
}
