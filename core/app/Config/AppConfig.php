<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class AppConfig {
    public const CACHE_DIRECTORY = __DIR__ . "/../../.cache";
    public const VIEWS_PATH = __DIR__ . "/../../../frontend/views";
    public const ADMIN_VIEWS_PATH = __DIR__ . "/../../views";
    public const VIEW_PARTIALS_PATH = self::VIEWS_PATH . "/partials";

    public static $blog_config = null;

    public static function get_user_config(): array {
        if (self::$blog_config === null) {
            $config_path = __DIR__ . "/../../../config.json";

            if (file_exists($config_path)) {
                $json_content = file_get_contents($config_path);
                self::$blog_config = json_decode($json_content, true);
            }
            else {
                die("Configuration file not found at {$config_path}!");
            }
        }

        return self::$blog_config;
    }
}
