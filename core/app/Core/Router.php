<?php
declare(strict_types=1);

namespace AlmBlog\Core;

use AlmBlog\Config\AppConfig;

class Router {
    private const ADMIN_BASE_PATH = "/admin";

    public static $page_config = [];
    public static $page_path = "";
    public static $page_key = "";

    private static function parse_uri() {
        // Get the full URI and break it apart
        $full_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $full_path = rtrim($full_path, "/");

        if (AppConfig::is_admin()) {
            $full_path = substr($full_path, strlen(self::ADMIN_BASE_PATH));
        }

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

    private static function resolve_page(string $views_path, array $pages): void {
        $path_parts = Router::parse_uri();
        $page_key = count($path_parts) === 0 || $path_parts[0] === "" ? "home" : implode("/", $path_parts);
        $page_path_base = $views_path . "/pages/" . $page_key;
        $page_path = $page_path_base . ".php";

        if (!file_exists($page_path)) {
            $page_path = $page_path_base . "/index.php";
        }

        if (!file_exists($page_path)) {
            http_response_code(404);
            $page_key = "404";
            $page_path = $views_path . "/pages/404.php";
        }

        $page_config = isset($pages[$page_key]) ? $pages[$page_key] : [];

        Router::$page_config = $page_config;
        Router::$page_path = $page_path;
        Router::$page_key = $page_key;
    }

    public static function resolve_frontend_page(): void {
        $views_path = AppConfig::VIEWS_PATH;
        $pages = AppConfig::get_user_config()["pages"];
        Router::resolve_page($views_path, $pages);
    }

    public static function resolve_admin_page(): void {
        $views_path = AppConfig::ADMIN_VIEWS_PATH;
        $pages = AppConfig::get_admin_config()["pages"];
        Router::resolve_page($views_path, $pages);
    }
}
