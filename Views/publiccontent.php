<?php

use App\Controllers\ControllerText;

$controller = new ControllerText();

?>
<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1; 

$controller->show($page);
echo "<h1>" . htmlspecialchars($titre) . "</h1><br>"; 
        echo nl2br(htmlspecialchars($contenu)) . "<br>"; 

?>