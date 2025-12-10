<?php
use App\Config\AppConfig;
use App\Config\NavConfig;
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

        <title><?php if (isset($page_title)) echo $page_title . " | "; ?> Alm Blog</title>

        <link rel="icon" type="image/png" href="/images/favicon.png">

        <link rel="stylesheet" href="/_assets/css/styles.css?v=1.0">

        <?php
            if (isset($page_styles)) {
                foreach ($page_styles as $styles) {
                    echo "<link rel=\"stylesheet\" href=\"/_assets/css/" . $styles . "\">";
                }
            }
        ?>

        <script src="/_assets/js/scripts.js?v=1.0" async></script>

        <?php
            if (isset($page_scripts)) {
                foreach ($page_scripts as $script) {
                    echo "<script src=\"/_assets/js/" . $script[0] . "\" $script[1]></script>";
                }
            }
        ?>
    </head>
    <body>
        <header class="container-fluid container-xxl">
            <?php
                $white_logo = true;
                include(AppConfig::TEMPLATES_PATH . "/logo.php");
            ?>

            <nav>
                <?php
                    foreach (NavConfig::MAIN_NAV as $_nav_item) {
                        $current_uri = $_SERVER["REQUEST_URI"];
                        $is_homepage = $_nav_item["route"] === "/";
                        $href = $is_homepage ? "/" : "/" . $_nav_item["route"] . "/";
                        $classes = $current_uri === $href || ($current_uri === "" && $is_homepage) ? "main-nav-link selected" : "main-nav-link";
                        echo "<a href=\"" . $href . "\" class=\"" . $classes . "\">" . $_nav_item["title"] . "</a>";
                    }
                ?>
            </nav>
        </header>
