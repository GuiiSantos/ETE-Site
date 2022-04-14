<?php

namespace Source\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo {
    /** @var Optimizer */
    protected Optimizer $optimizer;

    /**
     * Seo constructor.
     * @param string $scheme
     */
    public function __construct(string $scheme = "article") {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
          CONF_SITE_NAME,
          CONF_SITE_LANG,
          $scheme
        );
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name) {
        return $this->optimizer->data()->$name;
    }

    /**
     * @param string|null $title
     * @param string|null $desc
     * @param string|null $url
     * @param string|null $image
     * @return string
     */
    public function render(?string $title, ?string $desc, ?string $url, ?string $image, bool $follow = true) {
        return $this->optimizer->optimize($title, $desc, $url, $image, $follow)->render();
    }

    /**
     * @param string|null $title
     * @param string|null $desc
     * @param string|null $url
     * @param string|null $image
     * @return Optimizer
     */
    public function data(?string $title, ?string $desc, ?string $url, ?string $image): Optimizer {
        return $this->optimizer->optimize($title, $desc, $url, $image);
    }

    /**
     * @return Optimizer
     */
    public function optimizer(): Optimizer {
        return $this->optimizer;
    }
}