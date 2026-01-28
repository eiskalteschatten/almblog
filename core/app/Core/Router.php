<?php
declare(strict_types=1);

namespace AlmBlog\Core;

use AlmBlog\Config\AppConfig;
use AlmBlog\Config\PageConfig;

class Router {
    private static function parse_uri() {
        // Get the full URI and break it apart
        $full_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $full_path = rtrim($full_path, "/");
        $path_parts = explode("/", $full_path);

        // Remove the unneeded parts: "/" and "index.php"
        $amount_to_remove = isset($path_parts[1]) && $path_parts[1] === "index.php" ? 2 : 1;
        array_splice($path_parts, 0, $amount_to_remove);

        return $path_parts;
    }

    private static function parse_uri_string(): string {
        $path_parts = Router::parse_uri();
        return implode("/", $path_parts);
    }

    public static function resolve_page(): void {
        $path_parts = Router::parse_uri();
        $page_key = count($path_parts) === 0 || $path_parts[0] === "" ? "home" : implode("/", $path_parts);
        $page_path_base = AppConfig::VIEWS_PATH . "/pages/" . $page_key;
        $page_path = $page_path_base . ".php";

        if (!file_exists($page_path)) {
            $page_path = $page_path_base . "/index.php";
        }

        if (!file_exists($page_path)) {
            http_response_code(404);
            $page_key = "404";
            $page_path = AppConfig::VIEWS_PATH . "/pages/404.php";
        }

        $pages = AppConfig::get_user_config()["pages"];
        $page_config = isset($pages[$page_key]) ? $pages[$page_key] : [];

        PageConfig::set_page_config($page_config);
        PageConfig::set_page_path($page_path);
        PageConfig::set_page_key($page_key);
    }
}
