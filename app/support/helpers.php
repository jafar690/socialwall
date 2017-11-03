<?php

if (! function_exists('route_is_active')) {
    /**
     * Detect Active Route
     *
     * @param  string $route
     * @param  string $output
     * @return string
     */
    function route_is_active($route, $output = "active")
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
}

if (! function_exists('routes_are_active')) {
    /**
     * Detect Active Routes
     *
     * @param  array  $routes
     * @param  string $output
     * @return string
     */
    function routes_are_active(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}
