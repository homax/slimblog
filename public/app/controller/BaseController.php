<?php

use \Slim\Slim;

class BaseController implements IController {

    protected $app;
    protected $template;

    function __construct()
    {
        $this->app = Slim::getInstance();
        $this->template = "";
    }

    public static function init($controller = "index", $action = "index") {
        $controller = ucfirst($controller) . "Controller";
        $action = strtolower($action) . "Action";
        if(class_exists($controller)) {
            $rc = new ReflectionClass($controller);
            if($rc->implementsInterface('IController')) {
                if($rc->hasMethod($action)) {
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod($action);
                    $method->invoke($controller);
                } else {
                    throw new Exception("Action");
                }
            } else {
                throw new Exception("Interface");
            }
        } else {
            throw new Exception("Controller");
        }
    }

}