<?php

class ArticleController extends BaseController {

    function __construct()
    {
        parent::__construct();
        $this->template = "article/";
    }

    public function indexAction() {
        $title = "Книжная полка";
        $this->app->render('header.vhtml', array('title' => $title));
        $this->app->render($this->template.'index.vhtml', array("title" => $title));
        $this->app->render('footer.vhtml');
    }
}