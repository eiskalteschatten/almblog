<?php
declare(strict_types=1);

use AlmBlog\Core\Router;
use AlmBlog\Config\AppConfig;
use AlmBlog\Pages\Nav;
use AlmBlog\Pages\SEO;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="en">
        <meta name="color-scheme" content="light dark">

        <title><?php echo SEO::get_full_page_title(); ?></title>

        <link rel="icon" type="image/png" href="/images/favicon.png">
        <link rel="stylesheet" href="/css/styles.css?v=1.0">
        <script src="/js/scripts.js?v=1.0" async></script>
    </head>
    <body>
        <header>
            <?php include(__DIR__ . "/../partials/logo.php"); ?>

            <nav>
                <a href="/admin" class="<?php echo Nav::get_active_css_class("home"); ?>">Home</a>
                <a href="/admin/posts" class="<?php echo Nav::get_active_css_class("posts"); ?>">Posts</a>
            </nav>
        </header>

        <?php include_once(Router::$page_path); ?>

        <footer>
            v<?php echo AppConfig::APP_VERSION; ?>
        </footer>
    </body>
</html>
