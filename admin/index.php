<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."..");
require_once ROOT."/vendor/autoload.php";

use Admin\Controllers\ControllerText;
use Admin\Router\Router;
use Admin\Models\Logs;
use Admin\Controllers\ControllerProfil;


$app = new Router();

$app->start();