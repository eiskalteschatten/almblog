<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class AppConfig {
    public const APP_VERSION = "1.0.0";
    public const VIEWS_PATH = __DIR__ . "/../../../frontend/views";
    public const ADMIN_VIEWS_PATH = __DIR__ . "/../../admin/views";

    public static $user_config = null;
    public static $admin_config = null;

    private static function load_json_config(string $config_path): array {
        if (file_exists($config_path)) {
            $json_content = file_get_contents($config_path);
            return json_decode($json_content, true);
        }
        else {
            die("Configuration file not found at {$config_path}!");
        }
    }

    public static function get_user_config(): array {
        if (self::$user_config === null) {
            $config_path = __DIR__ . "/../../../config.json";
            self::$user_config = self::load_json_config($config_path);
        }

        return self::$user_config;
    }

    public static function get_admin_config(): array {
        if (self::$admin_config === null) {
            $config_path = __DIR__ . "/../../admin/config.json";
            self::$admin_config = self::load_json_config($config_path);
        }

        return self::$admin_config;
    }
}
