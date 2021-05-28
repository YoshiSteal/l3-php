<?php


class Router
{

    /**
     *
     */
    function process()
    {
        /**
         * ex http://localhost/
         *
         * $uri = /
         */

        /**
         * ex http://localhost/catalog
         *
         * $uri = /catalog
         */

        /**
         * ex http://localhost/catalog/product
         *
         * $uri = /catalog/product
         */
        $uri = $_SERVER['REQUEST_URI'];

        /**
         * mapping entre $uri et routes.json
         * Prevoir route non connue => 404
         */

        $Json = file_get_contents("routes.json");
        $routes = json_decode($Json, true);

        foreach ($routes as $route){
            echo $uri;
            echo $route['path'];
            echo "<br>";
            if($route['path'] == $uri){
                echo $route['controller'];
            }
        }
        /**
         * instance controller de la route appel de la methode
         */

    }

}