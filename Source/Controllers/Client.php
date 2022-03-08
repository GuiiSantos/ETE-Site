<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Client extends Controller{

    public function __construct() {
        parent::__construct(CONF_VIEW_PATH);
    }

    public function home($data) {
        echo $this->view->render(
            "Client/home",
            [
                "page" => "page"
            ]
        );
    }

    public function estrutura($data) {
        echo $this->view->render(
            "Client/estruturaEscola",
            [
                "page" => "estruta"
            ]
        );
    }
    public function error(array $data) {
        echo $this->view->render(
            "Client/error",
            [
                "tileName" => "ETE"
            ]
        );
    }
}