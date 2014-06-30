<?php

class IndexController extends BaseController {

    function __construct()
    {
        parent::__construct();
    }

    public function indexAction() {
        $title = "Блог на основе Slim Framework v2.4.3";
        $this->app->render('header.vhtml', array('title' => $title));
        $this->app->render('index.vhtml');
        $this->app->render('footer.vhtml');
    }
}