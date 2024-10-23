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



            // Gestion spécifique pour les routes avec un ID utilisateur
            // if ($controllerName == 'User' && !empty($params[0])) {
            //     $id_user = $params[0]; // Récupération de l'ID utilisateur

            //     // Gestion pour l'édition de l'utilisateur
            //     if ($action == 'edit') {
            //         // Appel de la méthode edit avec l'ID utilisateur
            //         $controller->edit($id_user); 

            //         // Si tu souhaites rediriger après l'édition (par exemple vers la page utilisateur)
            //         header("Location: /admin/user"); // Redirection vers la liste des utilisateurs
            //         exit(); // Toujours utiliser exit après une redirection
            //     } 
            //     // Gestion pour la mise à jour de l'utilisateur
            //     elseif ($action == 'update') {
            //         $controller->update($id_user); // Appel de la méthode update avec l'ID utilisateur

            //         // Redirection vers la liste des utilisateurs après mise à jour
            //         header("Location: /admin/user"); // Redirection après mise à jour
            //         exit(); // Toujours utiliser exit après une redirection
            //     } else {
            //         http_response_code(404);
            //         echo "L'action $action n'existe pas pour User.";
            //     }
            // }



        }
        // Si aucune route n'est demandée, on charge la page d'accueil
        else {
            $controller = new ControllerText;
            $controller->index();
        }
    }
}
