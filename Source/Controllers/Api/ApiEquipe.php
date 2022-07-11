<?php


namespace Source\Controllers\Api;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Equipe;
use Source\Models\JobCategory;

class ApiEquipe extends Controller {
    public function __construct() {
        parent::__construct(CONF_URL_VIEWS);

        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }
    }

    public function addMember() {
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $job = filter_input(INPUT_POST, "job", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $jobCategoryId = filter_input(INPUT_POST, "job-category", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $canvas = filter_input(INPUT_POST, "canvas", FILTER_DEFAULT);

        $equipeModel = new Equipe();
        $jobCategoryModel = new JobCategory();

        if(!$name || !$job) {
            emit_json(["success" => false, "message" => "Selecione o nome e a função"]);
        }

        if(!$jobCategoryModel->findById($jobCategoryId)) {
            emit_json(["success" => false, "message" => "Selecione uma categoria"]);
        }

        if(!$canvas) {
            emit_json(["success" => false, "message" => "Selecione uma imagem"]);
        }

        $equipeModel->name = $name;
        $equipeModel->job = $job;
        $equipeModel->job_category_id = $jobCategoryId;
        if(!$equipeModel->save()) {
            emit_json(["success" => false, "message" => "Tente novamente mais tarde"]);
        }

        $path = url_image("equipe/{$equipeModel->id}");
        if(!saveCanvas($canvas, $path)) {
            $equipeModel->destroy();
            emit_json(["success" => false, "message" => "Tente novamente mais tarde"]);
        }

        emit_json(["success" => true, "message" => "Salvo com sucesso"]);
    }
}