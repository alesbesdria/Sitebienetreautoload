<?php

namespace App\Router;

use Admin\Controllers\RouterController;
use App\Controllers\ControllerText;
// use App\Controllers\ControllerProfil;


class Router
{
    public function start()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1);
            http_response_code(301);
            header('Location: ' . $uri);
            exit; // Ajoutez exit après redirection
        }

        $params = [];
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
        }

        // Vérifiez que $params[0] existe
        if (!empty($params) && isset($params[0])) {
            $controllerName = 'Controller' . ucfirst(array_shift($params));
            $controllerClass = '\\App\\Controllers\\' . $controllerName;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                $action = (isset($params[0])) ? array_shift($params) : 'index';

                if (method_exists($controller, $action)) {
                    // $controller->$action($params);
                    $controller->$action(isset($params[0]) ? $params[0] : null);
                } else {
                    http_response_code(404);
                    echo "La page recherchée n'existe pas";
                }
            } else {
                http_response_code(404);
                echo "Le contrôleur n'existe pas";
            }
        } else {
            echo 'Pas de paramètres';
            $controller = new RouterController();
            $controller->index();
        }
    }
}