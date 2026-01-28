<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class PageConfig {
   public static $page_config = [];
   public static $page_path = "";
   public static $page_key = "";

    public static function set_page_config(array $page_config): void {
        self::$page_config = $page_config;
    }

    public static function set_page_path(string $page_path): void {
        self::$page_path = $page_path;
    }

    public static function set_page_key(string $page_key): void {
        self::$page_key = $page_key;
    }
}
