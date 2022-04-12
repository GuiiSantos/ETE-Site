<?php

/**
 * ###############
 * ###   URL   ###
 * ###############
 */

/**
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string {
    if($path) {
        return CONF_URL_ROOT . "/" . ($path[0] == "/" ? substr($path, 1) : $path);
    }

    return CONF_URL_ROOT;
}

function url_image(string $path = null): string {
    if($path) {
        return CONF_URL_IMAGES . "/" . ($path[0] == "/" ? substr($path, 1) : $path);
    }

    return CONF_URL_IMAGES;
}

/**
 * @param string $url
 */
function redirect(string $url): void {
    header("HTTP/1.1 302 Redirect");
    if(filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        die();
    }
}

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */

/**
 * @param string $password
 * @return bool
 */
function is_passwd(string $password): bool {
    if(password_get_info($password)["algo"]) {
        return true;
    }

    return (mb_strlen($password) >= CONF_PASSWD_MIN_LEN) && (mb_strlen($password) <= CONF_PASSWD_MAX_LEN);
}

/**
 * @return string
 */
function csrf_input(): string {
    $session = new \Source\Core\Session();
    $session->csrf();
    return "<input type='hidden' name='csrf' value='" . ($session->csrf_token ?? "") . "'>";
}

function csrf_verify($request): bool {
    $session = new \Source\Core\Session();

    if(empty($session->csrf_token) || empty($request["csrf"]) || $request["csrf"] != $session->csrf_token) {
        return false;
    }
    return true;
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwd_verify(string $password, string $hash): bool {
    return password_verify($password, $hash);
}
