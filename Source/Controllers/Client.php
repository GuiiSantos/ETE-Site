<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Client extends Controller {

    public function __construct() {
        parent::__construct(CONF_URL_VIEWS);
    }

    public function home($data) {
        $seo = $this->seo->render(
            "Página Inicial | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg")
        );

        $this->view->addData(["seo" => $seo], "Client/base");
        echo $this->view->render(
            "Client/home",
            [
                "page" => "page"
            ]
        );
    }

    public function estrutura($data) {
        $seo = $this->seo->render(
            "Estruturas | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg")
        );

        $this->view->addData(["seo" => $seo], "Client/base");
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