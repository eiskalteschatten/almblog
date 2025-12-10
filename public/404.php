<?php
http_response_code(404);
require_once(__DIR__ . "/../src/bootstrap.php");

use App\Config\AppConfig;

require_once(AppConfig::TEMPLATES_PATH . "/header.php");
?>

<main class="container-fluid container-xxl">
    <h1 class="page-title">Page Not Found</h1>
    <p>Sorry, the page you are looking for does not exist. Please check the URL or return to the <a href="/">homepage</a>.</p>
</main>

<?php
require_once(AppConfig::TEMPLATES_PATH . "/footer.php");
