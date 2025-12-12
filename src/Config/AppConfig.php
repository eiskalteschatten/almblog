<?php
declare(strict_types=1);

namespace App\Config;

class AppConfig {
    public const CACHE_DIRECTORY = __DIR__ . "/../../.cache";
    public const TEMPLATES_PATH = __DIR__ . "/../../templates";

    // Could also add environment-specific configs
    public static function isProduction(): bool {
        return getenv('APP_ENV') === 'production';
    }
}
