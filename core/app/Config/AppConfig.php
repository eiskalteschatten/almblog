<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class AppConfig {
    public const VIEWS_PATH = __DIR__ . "/../../../frontend/views";
    public const ADMIN_VIEWS_PATH = __DIR__ . "/../../admin/views";

    public static $user_config = null;

    public static function get_user_config(): array {
        if (self::$user_config === null) {
            $config_path = __DIR__ . "/../../../config.json";

            if (file_exists($config_path)) {
                $json_content = file_get_contents($config_path);
                self::$user_config = json_decode($json_content, true);
            }
            else {
                die("Configuration file not found at {$config_path}!");
            }
        }

        return self::$user_config;
    }
}
