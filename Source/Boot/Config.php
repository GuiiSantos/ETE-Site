<?php

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
 * conexão com banco
 */
const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "jornal",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];

