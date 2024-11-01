<?php

namespace Admin\Router;

use Admin\Controllers\ControllerText;
// use Admin\Controllers\ControllerProfil;
// use Admin\Controllers\ControllerGallery;
// use Admin\Controllers\ControllerUser;


class Router
{
    public function start()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
            $uri = substr($uri, 0, -1);
            http_response_code(301);
            header('Location: ' . $uri);
            exit();
        }

        $params = [];
        if (isset($_GET['url'])) {
            $params = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
        }
        if (!empty($params[0])) {
            $controllerName = ucfirst(array_shift($params));
            $controllerClass = '\\Admin\\Controllers\\Controller' . $controllerName;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass;
            } else {
                http_response_code(404);
                echo "Le contrôleur $controllerClass n'existe pas.";
                exit();
            }

            $action = !empty($params) ? array_shift($params) : 'index';
            if (method_exists($controller, $action)) {
                $controller->$action(...$params);
            } else {
                http_response_code(404);
                echo "La méthode $action n'existe pas dans le contrôleur $controllerClass.";
            }
        }
        else {
            $controller = new ControllerText;
            $controller->index();
        }
    }
}
