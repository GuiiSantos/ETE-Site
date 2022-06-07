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
$router->get("/estrutura", "Client:estrutura");
$router->get("/equipe", "Client:equipe");

$router->group("/oops");
$router->get("/{errcode}","Client:error");

/**
 * ADMIN
 */

$router->group("admin");
$router->get("/login", "Admin:login");
$router->post("/login", "Admin:login");

$router->get("/painel", "Admin:dashboard");
$router->get("/sair", "Admin:logout");

/**
 * API
 */
$router->group("/api");

$router->post("/posts/alternar/ativo/{id}", "Api:toggleActive");
$router->post("/posts/alternar/fixado/{id}", "Api:togglePinned");
$router->delete("/posts/apagar/{id}", "Api:deletePost");

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