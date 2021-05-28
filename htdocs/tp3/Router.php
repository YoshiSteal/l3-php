<?php


class Router
{

    function map($uri){
        $Json = file_get_contents("routes.json");
        $routes = json_decode($Json, true);

        foreach ($routes as $route){
            if($route['path'] == $uri){
                return "App\Controller\\".$route['controller'];
            }
        }
        return null;
    }

    function process()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $controller = $this->map($uri);
        if($controller == null) {
            header("HTTP/1.0 404 Not Found");
            http_response_code(404);
        }else{
            list($controllerObject, $method) = explode("@", $controller);
            return call_user_func_array([$controllerObject, $method], []);
        }
    }

}