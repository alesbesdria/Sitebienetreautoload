<?php

namespace Admin\Router;

use Admin\Controllers\ControllerText;
use Admin\Controllers\ControllerProfil;
use Admin\Controllers\ControllerGallery;
use Admin\Controllers\ControllerUser;

// namespace Admin\Controllers;

// use Admin\Controllers\RouterController;
// use Admin\Controllers\Controllertext;

class Router
{
    public function start()
    {
        $uri = $_SERVER['REQUEST_URI'];

        // Redirection si l'URI se termine par un slash
        if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
            $uri = substr($uri, 0, -1);
            http_response_code(301);
            header('Location: ' . $uri);
            exit();
        }

        // Récupération des paramètres dans l'URL
        $params = [];
        if (isset($_GET['url'])) {
            $params = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
        }
        // var_dump($params);
        // Si une route est demandée
        if (!empty($params[0])) {
            // Capture le premier paramètre (nom du contrôleur)
            $controllerName = ucfirst(array_shift($params));
            $controllerClass = '\\Admin\\Controllers\\Controller' . $controllerName;

            // Vérification de l'existence du contrôleur
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass;
            } else {
                http_response_code(404);
                echo "Le contrôleur $controllerClass n'existe pas.";
                exit();
            }

            // Capture la méthode (action) et les paramètres
            $action = !empty($params) ? array_shift($params) : 'index';
            $controller->$action(...$params);

        }
        // Si aucune route n'est demandée, on charge la page d'accueil
        else {
            $controller = new ControllerText;
            $controller->index();
        }
    }
}
