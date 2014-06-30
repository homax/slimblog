<?php
require "../vendor/autoload.php";
set_include_path(get_include_path()
    .PATH_SEPARATOR.'app/controller'
    .PATH_SEPARATOR.'app/model');
function myAutoload($class){
    require_once($class.'.php');
}
spl_autoload_register("myAutoload");
$app = new \Slim\Slim();
$view = $app->view();
$view->setTemplatesDirectory('./app/view/bootstrap');
$app->get('/', function () {
    BaseController::init();
});
$app->get('/articles', function () {
    BaseController::init("article");
});
$app->run();