<?php
require_once(__DIR__ . "/../src/bootstrap.php");

use App\Config\AppConfig;

require_once(AppConfig::TEMPLATES_PATH . "/header.php");
?>

<main class="container-fluid container-xxl">
    Alm Blog Home Page
</main>


<?php
require_once(AppConfig::TEMPLATES_PATH . "/footer.php");
