<?php


namespace Source\Core;

use League\Plates\Engine;

class View {

    /** @var Engine $engine */
    private Engine $engine;

    /**
     * View constructor.
     * @param string $path
     */

    public function __construct(string $path = CONF_URL_VIEWS) {
        $this->engine = new Engine($path);
    }

    /**
     * @param array $data
     * @param string $templates
     * @return View
     */
    public function addData(array $data, string $templates): View {
        $this->engine->addData($data, $templates);
        return $this;
    }

    /**
     * @param string $templateName
     * @param array $data
     * @return string
     */
    public function render(string $templateName, array $data = []): string {
        return $this->engine->render($templateName, $data);
    }

}