<?php


namespace Source\Models;


use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use \Exception;
use PDO;
use PDOException;

class Posts extends DataLayer {
    public function __construct() {
        parent::__construct("posts", ["title"]);
    }

    /**
     * @param bool $all
     * @return array|mixed|null
     */
    public function fetchArray() {
        try {
            $stmt = Connect::getInstance()->prepare($this->statement . $this->group . $this->order . $this->limit . $this->offset);
            $stmt->execute($this->params);

            if (!$stmt->rowCount()) {
                return null;
            }

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
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