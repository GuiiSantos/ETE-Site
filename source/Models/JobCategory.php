<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;
use Source\Support\Message;

class JobCategory extends DataLayer {

    /** @var Message $message */
    private Message $message;

    public function __construct() {
        parent::__construct("job_category", ["name"], "job_category_id", false);
        $this->message = new Message();
    }
}