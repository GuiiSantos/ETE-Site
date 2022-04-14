<?php

namespace Source\Core;


use Source\Support\Seo;

class Controller {
    /** @var View $view */
    protected View $view;

    /** @var Seo $seo */
    protected Seo $seo;

    /**
     * Controller constructor.
     * @param string|null $pathViews
     */
    public function __construct(string $pathViews = null) {
        $this->view = new View($pathViews);
        $this->seo = new Seo();
    }
}