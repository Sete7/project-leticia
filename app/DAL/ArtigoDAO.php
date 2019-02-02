<?php

require_once 'Banco.php';

class ArtigoDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    /*     * ****************************** PAINEL ADMINISTRATIVO ********************************** */

    public function Cadastrar(Artigo $artigo) {
        try {
            $sql = "INSERT INTO artigo (titulo,url,descricao,status,thumb,data) "
                    . "VALUES (:titulo, :url, :descricao, :status, :thumb, :data)";
            $param = array(
                ":titulo" => $artigo->getTitulo(),                
                ":url" => $artigo->getUrl(),
                ":descricao" => $artigo->getDescricao(),                
                ":status" => $artigo->getStatus(),
                ":thumb" => $artigo->getThumb(),
                ":data" => $artigo->getData()
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

    public function Atualizar(Artigo $artigo) {
        try {

            $sql = "UPDATE artigo SET titulo = :titulo, url = :url, 
                descricao = :descricao, status = :status, data = :data
                WHERE cod = :cod";

            $param = array(
                ":cod" => $artigo->getCod(),
                ":titulo" => $artigo->getTitulo(),                
                ":url" => $artigo->getUrl(),
                ":descricao" => $artigo->getDescricao(),                
                ":status" => $artigo->getStatus(),
                ":data" => $artigo->getData()
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

    public function Excluir($cod) {
        try {
            $sql = "DELETE FROM artigo WHERE cod = :cod";
            $param = array(":cod" => $cod);
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //quantidades de artigos
    public function RetornaQtdArtigo() {
        try {
            $sql = "SELECT count(pr.cod) as total FROM artigo pr";
            $dr = $this->pdo->ExecuteQueryOneRow($sql);
            if ($dr["total"] != null):
                return $dr["total"];
            else:
                return 0;
            endif;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorno de artigo com imagem
    public function retornaArtImagem($cod) {
        try {
            $sql = "SELECT cod, titulo, data, thumb FROM artigo WHERE cod = :cod";
            $param = array(":cod" => $cod);
            //Data Table
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $artigo = new Artigo();
            $artigo->setCod($dt['cod']);
            $artigo->setTitulo($dt['titulo']);
            $artigo->setThumb($dt['thumb']);
            $artigo->setData($dt['data']);
            return $artigo;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna dados do artigo atraavés do cod
    public function retornaIdArtigo($cod) {
        try {
            $sql = "SELECT * FROM artigo WHERE cod = :cod";

            $param = array(":cod" => $cod);
            //Data Table
            $pts = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $artigo = new Artigo();
            $artigo->setCod($pts['cod']);
            $artigo->setTitulo($pts['titulo']);
            $artigo->setUrl($pts['url']);
            $artigo->setDescricao($pts['descricao']);            
            $artigo->setStatus($pts['status']);
            $artigo->setThumb($pts['thumb']);
            $artigo->setData($pts['data']);            

            return $artigo;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function AlterarImagem($cod, $thumb) {
        try {
            $sql = "UPDATE artigo SET thumb = :thumb WHERE cod = :cod";
            $param = array(
                ":cod" => $cod,
                ":thumb" => $thumb
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

    /*     * ****************************** SITE ********************************** */

    public function ListarTodosArtigos() {
        try {
            $sql = "SELECT * FROM artigo WHERE status = 1 ORDER BY cod DESC ";

            $dt = $this->pdo->ExecuteQuery($sql);

            $listarArtigo = [];

            foreach ($dt as $pts) {
                $artigo = new Artigo();
                $artigo->setCod($pts['cod']);
                $artigo->setTitulo($pts['titulo']);
                $artigo->setUrl($pts['url']);
                $artigo->setDescricao($pts['descricao']);                
                $artigo->setStatus($pts['status']);
                $artigo->setThumb($pts['thumb']);
                $artigo->setData($pts['data']);

                $listarArtigo[] = $artigo;
            }
            return $listarArtigo;
        } catch (Exception $exc) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    /* CARREGANDO POST */

    public function ListarArtigoLimite($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT * FROM artigo ORDER BY cod DESC LIMIT :inicio, :quantidade";
            $param = array(
                ":inicio" => $inicio,
                ":quantidade" => $quantidade
            );
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listaArtigo = [];
            foreach ($dt as $pts) {
                $artigo = new Artigo();
                $artigo->setCod($pts['cod']);
                $artigo->setTitulo($pts['titulo']);
                $artigo->setUrl($pts['url']);
                $artigo->setThumb($pts['thumb']);
                $artigo->setDescricao($pts['descricao']);
                $artigo->setStatus($pts['status']);
                $artigo->setData($pts['data']);
                $listaArtigo[] = $artigo;
            }
            return $listaArtigo;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //RETORNA PRODUCT PELA URL
    public function retornaUrlArtigo($url) {
        try {
            $sql = "SELECT * FROM artigo WHERE url = :url";

            $param = array(":url" => $url);
            //Data Table
            $pts = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $artigo = new Artigo();
            $artigo->setCod($pts['cod']);
            $artigo->setTitulo($pts['titulo']);
            $artigo->setUrl($pts['url']);
            $artigo->setDescricao($pts['descricao']);
            $artigo->setStatus($pts['status']);
            $artigo->setThumb($pts['thumb']);
            $artigo->setData($pts['data']);
            
            return $artigo;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna uma lista de pesquisa page index
    public function buscarArtigo() {
        try {
            $sql = "SELECT p.titulo,p.categoria,p.url,p.descricao,p.data,c.titulo,c.url
                    FROM artigo AS p
                    INNER JOIN
                    categoria AS c
                    ON 
                    p.titulo = c.url
                    LIKE p.categoria WHERE p.titulo = c.titulo;";            
            

            $dt = $this->pdo->ExecuteNonQuery($sql);
            $listaArtigo = [];
            foreach ($dt as $pts):
                $artigo = new Artigo();
                $artigo->setCod($pts['cod']);

                $listaArtigo[] = $artigo;
            endforeach;

            return $listaArtigo;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
