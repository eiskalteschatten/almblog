<?php
declare(strict_types=1);

require_once(__DIR__ . "/Config/AppConfig.php");

spl_autoload_register(function ($class) {
    // Define namespace to directory mappings
    $prefixes = [
        'AlmBlog\\Core\\' => __DIR__ . "/../app/Core",
        'AlmBlog\\Config\\' => __DIR__ . "/../app/Config",
        'AlmBlog\\Pages\\' => __DIR__ . "/../app/Pages",
        // 'AlmBlog\\Services\\' => __DIR__ . "/../app/Services",
    ];

    // Check each prefix
    foreach ($prefixes as $prefix => $base_dir) {
        $len = strlen($prefix);

        // Does the class use this namespace prefix?
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }

        // Get the relative class name (remove namespace prefix)
        $relative_class = substr($class, $len);

        // Convert namespace separators to directory separators
        $file = $base_dir . '/' . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
