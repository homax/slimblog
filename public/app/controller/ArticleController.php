<?php

class ArticleController extends BaseController {

    function __construct()
    {
        parent::__construct();
        $this->template = "article/";
    }

    public function indexAction() {
        $title = "Статьи";
        $this->app->render('header.vhtml', array("app" => $this->app,
                                                "template"=> "/".$this->curTemplate.$this->template."/",
                                                'title' => $title));
        $this->app->render($this->template.'index.vhtml', array("app" => $this->app, "title" => $title));
        $this->app->render('footer.vhtml');
    }
}