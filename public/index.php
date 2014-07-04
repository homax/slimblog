<?php
require "../vendor/autoload.php";
set_include_path(get_include_path()
    .PATH_SEPARATOR.'app/controller'
    .PATH_SEPARATOR.'app/model');
function myAutoload($class){
    require_once($class.'.php');
}
spl_autoload_register("myAutoload");
assert_options(ASSERT_ACTIVE, 0);
$app = new \Slim\Slim();
$view = $app->view();
$app->view->setData(array(
    'mainmenu' => array(
        "Статьи" => "/articles"
    )
));
$view->setTemplatesDirectory('./app/view/bootstrap');
$app->get('/', function () {
    BaseController::init();
});
$app->get('/articles/', function () {
    BaseController::init("article");
})->name('articles');
$app->get('/articles/:id/', function ($id) {
    BaseController::init("article", "view", array("id" => $id));
})->name('article_view');
$app->run();