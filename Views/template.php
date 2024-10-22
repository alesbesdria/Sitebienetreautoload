<?php

// use App\Controllers\ControllerText;
// $controller = new ControllerText();

// $textes = $controller->getTexteData();

include($_SERVER["DOCUMENT_ROOT"] . "/public/_blocks/doctypeup.php");

// require($_SERVER["DOCUMENT_ROOT"] . "/src/Controllers/controlertext.php");
// require($_SERVER["DOCUMENT_ROOT"] . "/src/Controllers/controlergalerie.php");
// require($_SERVER["DOCUMENT_ROOT"] . "/src/Controllers/controlervisiteur.php");
use App\Controllers\ControllerText;




require_once $view;
?>

<?php


include($_SERVER["DOCUMENT_ROOT"] . "/public/_blocks/doctypedown.php");

?>