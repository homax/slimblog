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
$app->view->setData(array(
    'mainmenu' => array(
        "Статьи" => "/articles",
        "Статьи2" => "javascript: void(0);",
        "Статьи3" => "javascript: void(0);"
    )
));
$view->setTemplatesDirectory('./app/view/bootstrap');
$app->get('/', function () {
    BaseController::init();
});
$app->get('/articles', function () {
    BaseController::init("article");
});
$app->run();