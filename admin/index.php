

<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"] . "..");
require_once ROOT . "/vendor/autoload.php";

session_start();

use Admin\Router\Router;

$app = new Router();

$app->start();
