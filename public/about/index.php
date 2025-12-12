<?php
declare(strict_types=1);

require_once(__DIR__ . "/../../src/bootstrap.php");

use App\Config\AppConfig;

$page_title = "About Alm Blog";
require_once(AppConfig::TEMPLATES_PATH . "/header.php");
?>

<main class="container-fluid container-xxl">
  <h1>About Alm Blog</h1>
</main>

<?php
require_once(AppConfig::TEMPLATES_PATH . "/footer.php");
