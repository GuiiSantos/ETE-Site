<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;
use Source\Support\Message;

class Equipe extends DataLayer {

    /** @var Message $message */
    private Message $message;

    public function __construct() {
        parent::__construct("equipe", ["name", "job", "job_category_id"], "id", false);
        $this->message = new Message();
    }

}