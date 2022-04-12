<?php


namespace Source\Boot;

use Source\Core\Session;

class Message {
    /** @var string $text */
    private string $text;

    /** @var string $type */
    private string $type;

    /**
     * @return string
     */
    public function __toString() {
        return $this->getText();
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function info(string $message): Message {
        $this->type = CONF_MESSAGE_INFO;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function success(string $message): Message {
        $this->type = CONF_MESSAGE_SUCCESS;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function warning(string $message): Message {
        $this->type = CONF_MESSAGE_WARNING;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function error(string $message): Message {
        $this->type = CONF_MESSAGE_ERROR;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function json(): string {
        return json_encode(["error" => $this->getText()]);
    }

    /**
     *  Cria o flash na seção
     */
    public function flash() {
        (new Session())->set("flash", $this);
    }

    /**
     * @param string $message
     * @return string
     */
    public function filter(string $message): string {
        return filter_var($message, FILTER_SANITIZE_STRING);
    }
}