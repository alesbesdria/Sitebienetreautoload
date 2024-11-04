<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"] . "..");
require_once ROOT . "/vendor/autoload.php";

use Admin\Router\Router;

$app = new Router();

$app->start();
