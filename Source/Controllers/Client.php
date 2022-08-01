<?php

namespace Source\Controllers;

use http\Url;
use Source\Core\Controller;
use Source\Models\Posts;
use CoffeeCode\Paginator\Paginator;

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

        $data = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        $paginator = new Paginator(url("/?page="));
        $paginator->pager((new Posts())->find()->count(), 9, $data, 3, "portifolio");

        $posts = (new Posts())->find("active = TRUE")->order("created_at DESC")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);


        $this->view->addData(["seo" => $seo], "Client/base");
        echo $this->view->render(
            "Client/home",
            [
                "posts" => $posts,
                "paginator" =>  $paginator->render(),
                "page" => "page"
            ]
        );
    }

    public function equipe() {
        $seo = $this->seo->render(
            "Equipe | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg")
        );

        $this->view->addData(["seo" => $seo], "Client/base");
        echo $this->view->render("Client/equipe");
    }

    public function estrutura($data) {
        $seo = $this->seo->render(
            "Estruturas | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg")
        );

        $this->view->addData(["seo" => $seo], "Client/base");
        echo $this->view->render("Client/estruturaEscola");
    }

    public function error(array $data) {
        $errCode = filter_var($data["errcode"], FILTER_SANITIZE_STRING);
        if(!is_numeric($errCode)) $errCode = "404";

        $seo = $this->seo->render(
            "Oops | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg")
        );
        $this->view->addData(["seo" => $seo], "Client/base");
        echo $this->view->render(
            "Client/error",
            [
                "errCode" => "•" . $errCode . "•",
                "errMessage"
            ]
        );
    }
}