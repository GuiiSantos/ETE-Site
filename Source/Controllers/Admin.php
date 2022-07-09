<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\User;
use Source\Models\Posts;
use Source\Support\Message;


class Admin extends Controller{

    public function __construct() {
        parent::__construct(CONF_URL_VIEWS);
    }

    public function entrar() {
        $session = new Session();
        if ($session->has("user") && $session->user->access_level !== "1") {
            redirect(url("admin/painel"));
        }

        $filter = [
            "username" => FILTER_SANITIZE_STRING,
            "password" => FILTER_DEFAULT,
            "csrf" => FILTER_DEFAULT,
        ];
        $post = filter_input_array(INPUT_POST, $filter);
        $message = null;
        if ($post) {
            $data = (object)$post;

            if (!csrf_verify($post)) {
                // previne ataques csrf
                $message = new Message();
                $message->warning("Por favor clique no botão entrar");
            } else {
                // faz o login do usúario, ou cria uma mensagem de aviso
                $user = (new User());

                if ($userData = $user->login($data->username, $data->password)) {
                    (new Session())->set("user", $userData);
                    redirect(url("admin/painel"));
                }

                $message = $user->message();
            }

        }

        $seo = $this->seo->render(
            "Entrar | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg"),
            false
        );

        echo $this->view->render("admin/entrar",
            [
                "seo" => $seo,
                "message" => $message,
                "csrf" => $message,
                "pageId" => "login"
            ]
        );
    }
    public function dashboard() {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $seo = $this->seo->render(
            "Painel de Administração | " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg"),
            false
        );

        $this->view->addData([
            "seo" => $seo,
            "user" => $session->user,
            "pageId" => "dashboard"
        ],
            "admin/base");
        echo $this->view->render("admin/dashboard",
            [
                "posts" => (new Posts())->find()->fetch(true)
            ]);
    }

    public function editor(array $data) {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $posts = null;
        if(!empty($data["id"]) && $id = filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $posts = (new Posts())->findById($id);
        }

        // SEO da pagina
        $seo = $this->seo->render(
            "Criar/Editar | " . CONF_SITE_NAME,
            "Gerencie os posts do site, criando, excluindo ou desativando seus posts",
            url(),
            url("assets/img/ete-belo-jardim-shared.jpg"),
            false
        );

        $this->view->addData(
            [
                "seo" => $seo,
                "pageId" => "editor",
                "user" => $session->user

            ], "admin/base");
        echo $this->view->render(
            "Admin/editor",
            [
                "posts" => $posts
            ]
        );
    }

    public function logout() {
        (new Session())->destroy();
        redirect(url("admin/entrar"));
    }
}