<?php

namespace Source\Core;

class Controller {
    /** @var View $view */
    protected View $view;

    /**
     * Controller constructor.
     * @param string|null $pathViews
     */
    public function __construct(string $pathViews = null) {
        $this->view = new View($pathViews);
    }
}