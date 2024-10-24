<?php

namespace Controller;

class Controller
{
    protected $controllerName;
    protected $controllerMethod;

    public function __construct()
    {
        $this->controllerName = "Base Controller";
        $this->controllerMethod = "GET";
    }

    // This method can be used to retrieve attributes from the controller
    public function getControllerAttribute()
    {
        return [
            "name" => $this->controllerName,
            "method" => $this->controllerMethod
        ];
    }
}
