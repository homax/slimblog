<?php

class M_Articles {

    private static $instance;
    private $db;

    public static function Instance()
    {
        if (self::$instance == null)
            self::$instance = new self();

        return self::$instance;
    }

    public function __construct()
    {
        $this->db = Database::Instance();
    }

    public function getArticles()
    {
        return $this->db->db->articles();
    }

    /**
     * @param int $id Contains id of article
     * @return mixed Returns article with id = $id
     */
    public function getArticle($id)
    {
        return $this->db->db->articles[$id];
    }

    /**
     * @return mixed Returns set of articles
     */
    public function getListOfArticles()
    {
        $articles = $this->db->db->articles();
        foreach ($articles as $key => $article) {
            $cats = array();
            foreach ($article->art_tag() as $book_category) {
                $cats[] = $book_category->tags["name"];
            }
            $articles[$key]['tags'] = $cats;
            $articles[$key]['cat'] = $article->categories['name'];
        }
        return $articles;
    }
} 