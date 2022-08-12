<?php

ob_start();

require_once __DIR__ . "/vendor/autoload.php";

/**
 * INICIALIZAÇÃO
 */

use CoffeeCode\Router\Router ;

$router = new  Router(url());
$router->namespace("Source\Controllers");

/**
 * CLIENT
 */
$router->group(null);
$router->get("/", "Client:home");
$router->get("/{page}", "Client:home");
$router->get("/estrutura", "Client:estrutura");
$router->get("/equipe", "Client:equipe");

$router->group("/oops");
$router->get("/{errcode}","Client:error");

/**
 * ADMIN
 */

$router->group("admin");
$router->get("/entrar", "Admin:entrar");
$router->post("/entrar", "Admin:entrar");

$router->get("/painel", "Admin:dashboard");
$router->get("/criar", "Admin:editor");
$router->get("/editar/{id}", "Admin:editor");
$router->get("/equipe", "Admin:equipe");
$router->get("/sair", "Admin:logout");

/**
 * API
 */
$router->group("/api");
$router->namespace("Source\Controllers\Api");

// POSTS
$router->get("/posts/pegar/{page}", "ApiPosts:getPosts");
$router->post("/posts/criar", "ApiPosts:createPost");
$router->post("/posts/atualizar/{id}", "ApiPosts:updatePost");
$router->post("/posts/imagem/{id}", "ApiPosts:uploadPostImage");
$router->post("/posts/alternar/ativo/{id}", "ApiPosts:toggleActive");
$router->post("/posts/alternar/fixado/{id}", "ApiPosts:togglePinned");
$router->delete("/posts/apagar/{id}", "ApiPosts:deletePost");

// EQUIPE
$router->post("/equipe/adicionar", "ApiEquipe:addMember");
$router->post("/equipe/atualizar", "ApiEquipe:updateMember");
$router->delete("/equipe/apagar/{id}", "ApiEquipe:deleteMember");

/**
 * CRIA AS ROTAS
 */
$router->dispatch();

/**
 * REDIRECIONA ERROS
 */
if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}

ob_end_flush();