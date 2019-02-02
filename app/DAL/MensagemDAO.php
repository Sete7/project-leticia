<?php

require_once 'Banco.php';

class MensagemDAO {
    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }
    
    public function InserirComentario(Mensagem $mensagem) {
        try {
            $sql = "INSERT INTO mensagens (nome,email,msg,data_msg) VALUES(:nome,:email,:msg,:data)";
            $param = array(
                ":nome" => $mensagem->getNome(),
                ":email" => $mensagem->getEmail(),
                ":msg" => $mensagem->getMsg(),
                ":data" => $mensagem->getData()
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function InsertRespost(Mensagem $mensagem) {
        try {
            $sql = "INSERT INTO mensagem (nome,email,msg,data_msg) VALUES (:nome,:email,:msg,:data)";
            $param = array(
                ":nome" => $mensagem->getNome(),
                ":email" => $mensagem->getEmail(),
                ":msg" => $mensagem->getMsg(),
                ":data" => $mensagem->getData()
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
public function responderMsg() {
        try {
            $sql = "SELECT * FROM mensagens ORDER BY id DESC";
            $dt = $this->pdo->ExecuteQuery($sql);
            $respMsg = [];

            foreach ($dt as $pts) {
                $mensage = new Mensagem();
                $mensage->setId($pts['id']);
                $mensage->setNome($pts['nome']);
                $mensage->setEmail($pts['email']);
                $mensage->setMsg($pts['msg']);
                $mensage->setData($pts['data_msg']);                

                $respMsg[] = $mensage;
            }
            return $respMsg;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
