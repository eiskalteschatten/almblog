<?php
spl_autoload_register(function ($class) {
    // Define namespace to directory mappings
    $prefixes = [
        'App\\Core\\' => __DIR__ . "/../src/Core",
        'App\\Config\\' => __DIR__ . "/../src/Config",
        'App\\Services\\' => __DIR__ . "/../src/Services",
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
