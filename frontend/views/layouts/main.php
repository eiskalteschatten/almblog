<?php
declare(strict_types=1);

use AlmBlog\Core\Router;
use AlmBlog\Config\AppConfig;
use AlmBlog\Pages\Nav;
use AlmBlog\Pages\SEO;

$resolved_page = Router::resolve_page();
$page_config = $resolved_page["config"];
$page_path = $resolved_page["path"];
?>

<!DOCTYPE html>
<html lang="<?php echo $user_config["language"] ?? 'en'; ?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="<?php echo $user_config["language"] ?? 'en'; ?>">
        <meta name="color-scheme" content="light dark">
        <meta name="description" content="<?php echo SEO::get_page_description();  ?>">
        <meta name="keywords" content="<?php echo SEO::get_page_keywords(); ?>">
        <meta name="author" content="<?php echo $user_config["authorName"]; ?>">

        <title><?php echo SEO::get_full_page_title(); ?></title>

        <link rel="icon" type="image/png" href="/images/favicon.png">
        <link rel="stylesheet" href="/css/styles.css?v=1.0">
        <script src="/js/scripts.js?v=1.0" async></script>
    </head>
    <body>
        <header>
            <div>
                <?php include("../partials/logo.php"); ?>

                <nav>
                    <a href="/" class="<?php echo Nav::get_active_css_class('/'); ?>">Home</a>
                    <a href="/about" class="<?php echo Nav::get_active_css_class('/about'); ?>">About</a>
                </nav>
            </div>
        </header>

        <?php include_once($page_path); ?>

        <footer>
            &copy <?php echo date("Y"); ?> <?php echo $user_config["authorName"]; ?>. All rights reserved.
        </footer>
    </body>
</html>
