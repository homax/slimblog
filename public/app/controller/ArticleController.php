<?php

class ArticleController extends BaseController {

    private $m_art;

    function __construct()
    {
        parent::__construct();
        $this->m_art = M_Articles::Instance();
        $this->template = "article/";
    }

    public function indexAction() {
        $title = "Статьи";

        $items = $this->m_art->getArticles();

        $this->app->render('header.vhtml', array("app" => $this->app,
                                                "template"=> "/".$this->curTemplate.$this->template."/",
                                                'title' => $title));
        $this->app->render($this->template . 'index.vhtml',
            array("app" => $this->app,
                "title" => $title,
                "articles" => $items));
        $this->app->render('footer.vhtml');
    }
}