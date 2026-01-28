<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class AppConfig {
    public const CACHE_DIRECTORY = __DIR__ . "/../../.cache";
    public const VIEWS_PATH = __DIR__ . "/../../../frontend/views";
    public const ADMIN_VIEWS_PATH = __DIR__ . "/../../views";
    public const VIEW_PARTIALS_PATH = self::VIEWS_PATH . "/partials";

    public static $blog_config = null;

    // Could also add environment-specific configs
    public static function is_production(): bool {
        return getenv('APP_ENV') === 'production';
    }

    public static function get_user_config(): array {
        if (self::$blog_config === null) {
            $configPath = __DIR__ . "/../../../config.json";

            if (file_exists($configPath)) {
                $jsonContent = file_get_contents($configPath);
                self::$blog_config = json_decode($jsonContent, true);
            }
            else {
                die("Configuration file not found at {$configPath}");
            }
        }

        return self::$blog_config;
    }
}
