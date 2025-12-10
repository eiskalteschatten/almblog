<?php
use App\Config\AppConfig;
use App\Config\NavConfig;
?>

        <footer class="footer top-footer">
            <div class="container-fluid container-xxl w-100 h-100 d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-0 justify-content-md-between">
                <?php
                    $white_logo = false;
                    include(AppConfig::TEMPLATES_PATH . "/logo.php");
                ?>

                <nav class="d-flex gap-4 align-items-center">
                    <?php
                        foreach (NavConfig::FOOTER_NAV as $_nav_item) {
                            $is_homepage = $_nav_item["route"] === "/";
                            $href = $is_homepage ? "/" : "/" . $_nav_item["route"] . "/";
                            echo "<a href=\"" . $href . "\" class=\"footer-link\">" . $_nav_item["title"] . "</a>";
                        }
                    ?>
                </nav>
            </div>
        </footer>

        <footer class="footer bottom-footer">
            <div class="container-fluid container-xxl w-100 h-100 d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-0 justify-content-md-between">
                <div>&copy; Alex Seifert 2025</div>

                <div class="d-flex gap-3 align-items-center">
                    <a href="/imprint" class="footer-link">Imprint</a>
                    <a href="/privacy-policy" class="footer-link">Privacy Policy</a>
                    <a href="/contact" class="footer-link">Contact</a>
                </div>
            </div>
        </footer>
    </body>
</html>
