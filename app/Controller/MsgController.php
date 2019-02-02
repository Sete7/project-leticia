<?php

class MsgController {

    private $MsgDAO;

    public function __construct() {
        $this->MsgDAO = new MensagemDAO();
    }
    
    public function InserirComentario(Mensagem $mensagem) {
        if(strlen($mensagem->getNome()) > 3 && strlen($mensagem->getEmail()) > 3 && strlen($mensagem->getMsg())):
        return $this->MsgDAO->InserirComentario($mensagem);
        else:
            return false;
        endif;
    }
    
    public function InsertRespost(Mensagem $mensagem) {
        if(strlen($mensagem->getNome()) > 3 && strlen($mensagem->getEmail()) > 3 && strlen($mensagem->getMsg())):
        return $this->MsgDAO->InsertRespost($mensagem);
        else:
            return false;
        endif;
    }
    
    public function responderMsg() {
        return $this->MsgDAO->responderMsg();
    }

}
