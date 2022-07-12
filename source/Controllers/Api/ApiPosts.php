<?php

namespace Source\Controllers\Api;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Posts;

class ApiPosts extends Controller {

    public function __construct() {
        parent::__construct(CONF_URL_VIEWS);
    }

    /**
     * Tenta criar o Post e retorna seu id caso consiga
     *
     * Method createPost
     */
    public function createPost() {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $canvas = filter_input(INPUT_POST, "canvas", FILTER_DEFAULT);

        $posts = new Posts();
        $posts->title = $title;
        $posts->title_id = str_slug($posts->title);
        if(!$posts->save()) {
            emit_json(["success" => false, "message" => $posts->fail()->getMessage()]);
        }

        if(!is_dir(url_image("post"))) {
            mkdir(url_image("post"));
        }

        if($canvas) {
            $path = url_image("post/{$posts->id}");

            if(!saveCanvas($canvas, $path)) {
                $posts->destroy();
                emit_json(["success" => false, "message" => "Não foi possivel salvar a capa"]);
            }
        }

        emit_json(["success" => true, "message" => "Post criada com sucesso", "id" => $posts->id]);
    }

    /**
     * atualizar os dados do post
     *
     * Method updatePost
     * @param array $data
     */
    public function updatePost($data) {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ckeditor = filter_input(INPUT_POST, "ckeditor", FILTER_DEFAULT);
        $canvas = filter_input(INPUT_POST, "canvas", FILTER_DEFAULT);

        if(!$id) {
            emit_json(["success" => false, "message" => "Não foi possivel atualizar o Post"]);
        }
        $posts = (new Posts())->findById($id);
        if(!$posts) emit_json(["success" => false, "message" => "Post não encontrada"]);

        $posts->title = $title;
        $posts->title_id = str_slug($posts->title);
        $posts->posts = $ckeditor;
        if(!$posts->save()) {
            emit_json(["success" => false, "message" => $posts->fail()->getMessage()]);
        }

        if($canvas) {
            $path = url_image("post/{$id}");

            if(!saveCanvas($canvas, $path)) {
                emit_json(["success" => false, "message" => "Não foi possivel salvar a capa"]);
            }
        }

        emit_json(["success" => true, "message" => "Post atualizado com sucesso"]);
    }

    /**
     * faz o upload da imagem na pasta post
     *
     * Method uploadPostImage
     * @param array $data
     */

    public function uploadPostImage(array $data) {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        if(isset($_FILES["upload"]["name"]) && $id) {
            $file = $_FILES["upload"];
            $fileName = time() . mb_strstr($file["name"], ".");

            $typesAllowed = [
                "image/png",
                "image/jpg",
                "image/jpeg"
            ];

            $path = url_image("post/{$id}");
            if(!is_dir($path)) {
                mkdir($path);
            }
            if(in_array($file["type"], $typesAllowed))
                if(move_uploaded_file($file["tmp_name"], $path . "/" . $fileName)) {
                    emit_json(["success" => true, "message" => "Imagem salva com sucesso",
                        "url" => url("assets/img/post/{$id}/$fileName")]);
                } else {
                    emit_json(["success" => false, "message" => "Ocorreu um erro inesperado"]);
                }
            } else {
                emit_json(["success" => false, "message" => "Selecione uma imagem (png, jpg, jpeg)"]);
            }
        }

    /**
     * Alterna se o Post esta ou não ativa
     *
     * Method toggleActivePost
     * @param array $data
     */
    public function toggleActive(array $data) {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        if($id) {
            $posts = (new Posts())->findById($id);
            $posts->active = !($posts->active);

            if($posts->save()) {
                emit_json(["success" => true]);
            }
        }

        emit_json(["success" => false]);
    }

    /**
     * Alterna se o Post esta ou não Fixado
     *
     * Method togglePinned
     * @param array $data
     */
    public function togglePinned(array $data) {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        if($id) {
            $posts = (new Posts())->findById($id);
            $posts->pinned = !($posts->pinned);

            if($posts->save()) {
                emit_json(["success" => true]);
            }
        }

        emit_json(["success" => false]);
    }

    /**
     * Apaga uma Post
     *
     * Method deletePost
     * @param array $data
     */
    public function deletePost(array $data) {
        $session = new Session();
        if(!$session->has("user") || $session->user->access_level === "1") {
            redirect(url());
        }

        $id = filter_var($data["id"], FILTER_VALIDATE_INT);

        if($id) {
            if($posts = (new Posts())->findById($id)) {

                $imagesPath = url_image("post/{$id}");
                if(file_exists($imagesPath) && is_dir($imagesPath)) {
                    $images = array_diff(scandir($imagesPath), ["..", "."]);

                    foreach($images as $image) {
                        $imagePath = $imagesPath . "/" . $image;

                        if(file_exists($imagePath) && is_file($imagePath)) {
                            unlink($imagePath);
                        }
                    }

                    rmdir($imagesPath);
                }

                if($posts->destroy()) {
                    emit_json(["success" => true]);
                }
            }
        }

        emit_json(["success" => false, "message" => "Post não encontrada"]);
    }
}