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

} 