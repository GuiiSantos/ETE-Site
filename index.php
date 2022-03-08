<?php
require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router ;

/**
 * iniciando a rota
 */

$router = new  Router(URLBASE);
$router->namespace("Source\Controllers");

/**
 * rota do client
 */
$router->group(null);
$router->get("/", "Client:home");
$router->get("/estrutura", "Client:estrutura");

$router->group("/error");
$router->get("/{errcode}","Client:error");

/**
 * executando as rotas
 */
$router->dispatch();



/**
 * This method executes the routes
 */

/**
 * Redirect all errors
 */

if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}