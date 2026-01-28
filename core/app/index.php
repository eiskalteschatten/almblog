<?php
declare(strict_types=1);

require_once(__DIR__ . "/autoload.php");

use AlmBlog\Core\Environment;
use AlmBlog\Config\AppConfig;
use AlmBlog\Core\Router;

Environment::load_dot_env();

if (isset($is_admin)) {
    AppConfig::get_admin_config();
    Router::resolve_admin_page();

    require_once(AppConfig::ADMIN_VIEWS_PATH . "/layouts/main.php");
}
else {
    AppConfig::get_user_config();
    Router::resolve_frontend_page();

    require_once(AppConfig::VIEWS_PATH . "/layouts/main.php");
}
