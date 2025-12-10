<?php
require_once(__DIR__ . "/../../src/bootstrap.php");

use App\Config\AppConfig;

$page_title = "About Alm Blog";
require_once(AppConfig::TEMPLATES_PATH . "/header.php");
?>

<main class="container-fluid container-xxl">
  About Me
</main>

<?php
require_once(AppConfig::TEMPLATES_PATH . "/footer.php");
