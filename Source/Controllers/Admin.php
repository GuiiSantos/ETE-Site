<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\User;
use Source\Support\Message;

class Admin extends Controller{

    public function __construct() {
        parent::__construct(CONF_URL_VIEWS);
    }
    public function login() {
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
        echo $this->view->render("admin/login",
            [
                "message" => $message,
                "csrf" => $message,
                "pageId" => "login"
            ]
        );
    }
    public function painel() {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $this->view->addData(
            ["user" => $session->user], "admin/base"
        );
        echo $this->view->render("admin/dashboard");
    }

    public function logout() {
        (new Session())->destroy();
        redirect(url("admin/login"));
    }
}