<?php

namespace App\Router;

use App\Controllers\ControllerText;
// use Exception;

class Router
{
    public function start()
    {
        // Récupérer l'URI actuelle
        $uri = $_SERVER['REQUEST_URI'];

        // Supprimer le slash final s'il existe, sauf si l'URI est simplement "/"
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1); // Supprimer le dernier slash
            http_response_code(301);  // Redirection permanente
            header('Location: ' . $uri);
            exit;
        }

        // Récupérer les paramètres de l'URL
        $params = [];
        $params = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($params);
      
        // Si aucun paramètre, charger la page par défaut
        if (empty($params) || !isset($params[0]) || $params[0] == "") {
            $controller = new ControllerText();
            return $controller->show(1);
        }

        // Le premier paramètre correspond au contrôleur
        $controllerName = 'Controller' . ucfirst(array_shift($params));  // Par exemple : "contacts" devient "ControllerContacts"
        $controllerClass = '\\App\\Controllers\\' . $controllerName;  // Namespace complet du contrôleur

        // Vérifier si le contrôleur existe
        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Le contrôleur $controllerClass n'existe pas.";
            return;
        }

        // Instancier le contrôleur
        $controller = new $controllerClass();

        // Le deuxième paramètre correspond à l'action (méthode)
        $action = (isset($params[0])) ? array_shift($params) : 'index';  // Si aucune action, utiliser "index"

        // Vérifier si la méthode existe dans le contrôleur
        if (!method_exists($controller, $action)) {
            http_response_code(404);
            echo "La méthode $action n'existe pas dans le contrôleur $controllerName.";
            return;
        }

        // Appeler la méthode correspondante
        if (!empty($params)) {
            // S'il reste des paramètres, on les passe à la méthode
            call_user_func_array([$controller, $action], $params);
        } else {
            // Sinon, appel de la méthode sans paramètre
            $controller->$action();
        }
    }
}

