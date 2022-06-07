<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;
use \Exception;

class Posts extends DataLayer {
    public function __construct() {
        parent::__construct("posts", ["title"]);
    }

    public function save(): bool {

        try {
            if (!$this->required()) {
                throw new Exception("Selecione o título");
            }

            if(mb_strlen($this->title) > 100) {
                throw new Exception("Título muito longos");
            }

            $posts = (new Posts())->find("title_id = :title_id", "title_id={$this->title_id}")->fetch();
            if(empty($this->id) && $posts) {
                throw new Exception("Título já esta sendo usado");
            }

            if(!empty($this->id) && $posts && $this->id !== $posts->id) {
                throw new Exception("Título já esta sendo usado");
            }

            return parent::save();

        } catch(\Exception $exception) {
            $this->fail = $exception;
            return false;
        }
    }
}