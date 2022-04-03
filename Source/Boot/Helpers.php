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

