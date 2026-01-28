<?php
declare(strict_types=1);

namespace AlmBlog\Pages;

use AlmBlog\Config\AppConfig;
use AlmBlog\Config\PageConfig;

class SEO {
    public static function get_full_page_title(): string {
        $user_config = AppConfig::get_user_config();
        $page_title = PageConfig::$page_config["title"] ?? "";
        $blog_name = $user_config["blogName"] ?? "Alm Blog";
        $title_separator = $user_config["titleSeparator"] ?? "|";

        if (!empty($page_title)) {
            return "{$page_title} {$title_separator} {$blog_name}";
        }

        return $blog_name;
    }

    public static function get_page_description(): string {
        $user_config = AppConfig::get_user_config();
        $page_config = PageConfig::$page_config;
        return $page_config["description"] ?? $user_config["seo"]["defaultDescription"];
    }

    public static function get_page_keywords(): string {
        $user_config = AppConfig::get_user_config();
        $page_config = PageConfig::$page_config;
        return $page_config["keywords"] ?? $user_config["seo"]["defaultKeywords"];
    }
}
