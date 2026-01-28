<?php
declare(strict_types=1);

require_once(__DIR__ . "/autoload.php");

use AlmBlog\Core\Environment;
use AlmBlog\Config\AppConfig;

Environment::load_dot_env();
AppConfig::get_user_config();
Router::resolve_page();

require_once(AppConfig::VIEWS_PATH . "/layouts/main.php");
