<?php
use App\Config\AppConfig;
use App\Config\NavConfig;
?>

        <footer class="container-fluid container-xxl">
            <?php
                $white_logo = false;
                include(AppConfig::TEMPLATES_PATH . "/logo.php");
            ?>

            <nav>
                <?php
                    foreach (NavConfig::FOOTER_NAV as $_nav_item) {
                        $is_homepage = $_nav_item["route"] === "/";
                        $href = $is_homepage ? "/" : "/" . $_nav_item["route"] . "/";
                        echo "<a href=\"" . $href . "\" class=\"footer-link\">" . $_nav_item["title"] . "</a>";
                    }
                ?>
            </nav>
        </footer>
    </body>
</html>
