<?php

if(CONF_SITE_STATUS === "development")
{
    $minJS = new \MatthiasMullie\Minify\JS();

    /**
     * FILES
     */
    $minJS->add(__DIR__ . "/../../assets/js/base.js");


    /**
     * LIBS
     */
    $libDir = scandir(__DIR__ . "/../../assets/js/lib");
    foreach($libDir as $lib) {
        $libFile = __DIR__ . "/../../assets/js/lib/" . $lib;
        if(is_file($libFile) && pathinfo($libFile)["extension"] === "js") {
            $minJS->add($libFile);
        }
    }


    /**
     * APP
     */
    $appDir = scandir(__DIR__ . "/../../assets/js/app");
    foreach($appDir as $app) {
        $appFile = __DIR__ . "/../../assets/js/app/" . $app;
        if(is_file($appFile) && pathinfo($appFile)["extension"] === "js") {
            $minJS->add($appFile);
        }
    }

    $minJS->minify(__DIR__ . "/../../assets/js/main.js");
}

