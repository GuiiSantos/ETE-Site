<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;
use Source\Core\Session;
use Source\Support\Message;

class User extends DataLayer {
    /** @var Message $message */
    private Message $message;

    public function __construct() {
        parent::__construct("user", ["username", "email", "password", "access_level"], "id", true);
        $this->message = new Message();
    }

    /**
     * Tenta fazer login e retorna os dados do usuário em caso de sucesso, caso falhe retorna null
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login(string $username, string $password): ?object {
        if(!$username || !$password) {
            $this->message->warning("Nome e senha devem ser informados");
            return null;
        }

        if(!is_passwd($password)) {
            $this->message->warning("A senha deve ter entre 8 e 40 caracteres");
            return null;
        }

        $user = $this->find("username = :username", "username={$username}")->fetch();
        if(!$user) {
            $this->message->warning("Usuário não encontrado");
            return null;
        }

        if(!passwd_verify($password, $user->password)) {
            $this->message->warning("Usuário ou senha não conferem");
            return null;
        }

        return $user;
    }

    /**
     * @return Message
     */
    public function message(): Message {
        return $this->message;
    }
}