<?php
require "../vendor/autoload.php";

$app = new \Slim\Slim();
$view = $app->view();
$view->setTemplatesDirectory('./app/view/bootstrap');
$app->get('/', function () use ($app) {
    $title = "Блог на основе Slim Framework v2.4.3";
    $app->render('../header.vhtml', array('title' => $title));
    $app->render('index.vhtml');
    $app->render('../footer.vhtml');
});
$app->run();