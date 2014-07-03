<?php

use \Slim\Slim;

class BaseController implements IController {

    protected $app;
    protected $template;
    protected $curTemplate;
    protected $mainmenu;

    function __construct()
    {
        $this->app = Slim::getInstance();
        $this->template = "";
        $view = $this->app->view();
        $this->curTemplate = $view->getTemplatesDirectory();
    }

    public static function init($controller = "index", $action = "index", $params = array()) {
        $controller = ucfirst($controller) . "Controller";
        $action = strtolower($action) . "Action";
        if(class_exists($controller)) {
            $rc = new ReflectionClass($controller);
            if($rc->implementsInterface('IController')) {
                if($rc->hasMethod($action)) {
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod($action);
                    $method->invoke($controller, $params);
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