<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class AppConfig {
    public const CACHE_DIRECTORY = __DIR__ . "/../../.cache";
    public const VIEWS_PATH = __DIR__ . "/../../views";
    public const VIEW_PARTIALS_PATH = self::VIEWS_PATH . "/partials";

    public static $blogConfig = null;

    // Could also add environment-specific configs
    public static function isProduction(): bool {
        return getenv('APP_ENV') === 'production';
    }

    public static function getUserConfig(): array {
        if (self::$blogConfig === null) {
            $configPath = __DIR__ . "/../../../config.json";

            if (file_exists($configPath)) {
                $jsonContent = file_get_contents($configPath);
                self::$blogConfig = json_decode($jsonContent, true);
            }
            else {
                die("Configuration file not found at {$configPath}");
            }
        }

        return self::$blogConfig;
    }
}
