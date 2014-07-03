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
        foreach ($items as $key => $item) {
            $items[$key]['url'] = $this->app->urlFor('article_view', array('id' => $item['id']));
        }


        $this->app->render('header.vhtml', array("app" => $this->app,
                                                "template"=> "/".$this->curTemplate.$this->template."/",
                                                'title' => $title));
        $this->app->render($this->template . 'index.vhtml',
            array("app" => $this->app,
                "title" => $title,
                "articles" => $items));
        $this->app->render('footer.vhtml');
    }

    /**
     * @param int $id This param contains article's id
     * @return void
     */
    public function viewAction($id)
    {
        $article = $this->m_art->getArticle($id);
        $title = $article['title'] . " | Slimblog";

        $this->app->render('header.vhtml', array("app" => $this->app,
            "template"=> "/".$this->curTemplate.$this->template."/",
            'title' => $title));
        $this->app->render($this->template . 'view.vhtml',
            array("app" => $this->app,
                "backurl" => $this->app->urlFor('articles'),
                "article" => $article));
        $this->app->render('footer.vhtml');
    }
}