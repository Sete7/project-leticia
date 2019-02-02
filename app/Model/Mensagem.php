<?php

class Mensagem {
    private $id;
    private $nome;
    private $email;
    private $msg;
    private $data;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getMsg() {
        return $this->msg;
    }

    function getData() {
        return $this->data;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }

    function setData($data) {
        $this->data = $data;
    }

}
