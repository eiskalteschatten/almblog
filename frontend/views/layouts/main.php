<?php
declare(strict_types=1);

use AlmBlog\Core\Router;
use AlmBlog\Config\PageConfig;
use AlmBlog\Config\AppConfig;

$resolved_page = Router::resolve_page();
$page_config = $resolved_page["config"];
$page_path = $resolved_page["path"];

// Ensure that the required variables are set
if (!isset($page_config) || !isset($page_path)) {
    throw new Exception("Required variables 'page_config' or 'page_path' are not set.");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="en">
        <meta name="author" content="Alex Seifert">
        <meta name="copyright" content="Copyright (c) Alex Seifert">
        <meta name="theme-color" content="#000000">
        <meta name="color-scheme" content="light dark">

        <title><?php if (isset($page_config["title"])) echo $page_config["title"] . " | "; ?> Alm Blog</title>

        <link rel="icon" type="image/png" href="/images/favicon.png">

        <link rel="stylesheet" href="/css/styles.css?v=1.0">

        <script src="/js/scripts.js?v=1.0" async></script>
    </head>
    <body>
        <header class="header">
            <div class="container-fluid container-xxl">
                <?php include(AppConfig::VIEW_PARTIALS_PATH . "/logo.php"); ?>

                <nav class="main-nav">
                    <?php
                        foreach (PageConfig::PAGES as $key => $_page_config) {
                            if (isset($_page_config["inMainNav"]) && $_page_config["inMainNav"] === true) {
                                $current_uri = substr($_SERVER["REQUEST_URI"], 1);
                                $current_uri = rtrim($current_uri, '/');
                                $is_homepage = $key === "home";
                                $href = $is_homepage ? "/" : "/" . $key;
                                $classes = $current_uri === $key || ($current_uri === "" && $is_homepage) ? "main-nav-link selected" : "main-nav-link";
                                echo "<a href=\"" . $href . "\" class=\"" . $classes . "\">" . $_page_config["mainNavTitle"] . "</a>";
                            }
                        }
                    ?>
                </nav>
            </div>
        </header>

        <?php include_once($page_path); ?>

        <footer class="container-fluid container-xxl">
            <?php include(AppConfig::VIEW_PARTIALS_PATH . "/logo.php"); ?>

            <nav>
                <?php
                    foreach (PageConfig::PAGES as $key => $_page_config) {
                        if (isset($_page_config["inFooterNav"]) && $_page_config["inFooterNav"] === true) {
                            $is_homepage = $key === "home";
                            $href = $is_homepage ? "/" : "/" . $key;
                            echo "<a href=\"" . $href . "\" class=\"footer-link\">" . $_page_config["mainNavTitle"] . "</a>";
                        }
                    }
                ?>
            </nav>
        </footer>
    </body>
</html>
