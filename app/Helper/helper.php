<?php

if(!function_exists("active")){
    function active($route, $class ="current-menu-item")
    {
        if(request()->routeIs($route) || request()->routeIs("$route.*")){
            return $class;
        }
        return "";
    }
}

?>