<?php
require_once __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router ;

/**
 * INICIALIZAÇÃO
 */

$router = new  Router(url());
$router->namespace("Source\Controllers");

/**
 * CLIENT
 */
$router->group(null);
$router->get("/", "Client:home");
$router->get("/estrutura", "Client:estrutura");

$router->group("/error");
$router->get("/{errcode}","Client:error");

/**
 * ADMIN
 */

$router->group("admin");
$router->get("/login", "Admin:login");
$router->post("/login", "Admin:login");

$router->get("/painel", "Admin:painel");
$router->get("/sair", "Admin:logout");

/**
 * CRIA AS ROTAS
 */
$router->dispatch();

/**
 * REDIRECIONA ERROS
 */
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}