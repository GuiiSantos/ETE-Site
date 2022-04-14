<?php

/**
 * SITE
 */
const CONF_SITE_NAME = "ETE Edson Mororó Moura - Belo Jardim/PE";
const CONF_SITE_DESC =
    "A ETE Edson Mororó Moura é referência de ensino no município de Belo Jardim/PE. Com cursos de Administração e Desenvolvimento de Sistemas.";
const CONF_SITE_LANG = "pt_BR";
const CONF_SITE_DOMAIN = "eteedsonmororomoura.com.br";
const CONF_SITE_STATUS = "development"; // production / development

/**
 * URLs
 */
const CONF_URL_ROOT = "http://eteedsonmororomoura";
const CONF_URL_IMAGES = __DIR__ . "/../../assets/img";
const CONF_URL_VIEWS = __DIR__ . "/../Views";

/**
 * PASSWORD
 */
const CONF_PASSWD_MIN_LEN = 8;
const CONF_PASSWD_MAX_LEN = 40;

/**
 * MESSAGE
 */
const CONF_MESSAGE_INFO = "info";
const CONF_MESSAGE_SUCCESS = "success";
const CONF_MESSAGE_WARNING = "warning";
const CONF_MESSAGE_ERROR = "error";

/**
 * BANCO DE DADOS
 */

if (CONF_SITE_STATUS === "development") {
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "162.241.203.225",
        "port" => "3306",
        "dbname" => "eteeds27_ete",
        "username" => "eteeds27_ete",
        "passwd" => "x5Yx2=o@5On.",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
} else {
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "ete",
        "username" => "root",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
}
