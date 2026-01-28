<?php
declare(strict_types=1);

namespace AlmBlog\Config;

class PageConfig {
   public static $page_config = "";

    public static function setPageConfig(array $page_config): void {
         self::$page_config = $page_config;
    }
}
