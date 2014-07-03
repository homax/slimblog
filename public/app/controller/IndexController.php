<?php

class IndexController extends BaseController {

    private $m_art;

    function __construct()
    {
        parent::__construct();
        $this->m_art = M_Articles::Instance();
    }

    public function indexAction() {
        $title = "Блог на основе Slim Framework v2.4.3";
        $articles = $this->m_art->getListOfArticles();
        foreach ($articles as $key => $item) {
            $articles[$key]['url'] = $this->app->urlFor('article_view', array('id' => $item['id']));
        }
        $this->app->render('header.vhtml', array("app" => $this->app,
                                                "template"=> $this->curTemplate,
                                                'title' => $title));
        $this->app->render('index.vhtml', array("articles" => $articles));
        $this->app->render('footer.vhtml');
    }
}