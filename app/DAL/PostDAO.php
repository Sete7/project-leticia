<?php

require_once 'Banco.php';

class PostDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    /*     * ****************************** PAINEL ADMINISTRATIVO ********************************** */

    public function Cadastrar(Post $post) {
        try {
            
            $sql = "INSERT INTO post (cod,titulo,categoria,url,descricao,valor,status,thumb,data) "
                    . "VALUES (:cod,:titulo, :categoria, :url, :descricao, :valor, :status, :thumb, :data)";
            $param = array(
                ":cod" => $post->getCod(),
                ":titulo" => $post->getTitulo(),
                ":categoria" => $post->getCategoria(),
                ":url" => $post->getUrl(),
                ":descricao" => $post->getDescricao(),
                ":valor" => $post->getValor(),
                ":status" => $post->getStatus(),
                ":thumb" => $post->getThumb(),
                ":data" => $post->getData()
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

    public function Atualizar(Post $post) {
        try {

            $sql = "UPDATE post SET titulo = :titulo, categoria = :categoria, url = :url, 
                descricao = :descricao, valor = :valor, status = :status, data = :data
                WHERE cod = :cod";

            $param = array(
                ":cod" => $post->getCod(),
                ":titulo" => $post->getTitulo(),
                ":categoria" => $post->getCategoria(),
                ":url" => $post->getUrl(),
                ":descricao" => $post->getDescricao(),
                ":valor" => $post->getValor(),
                ":status" => $post->getStatus(),
                ":data" => $post->getData()
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
            $sql = "DELETE FROM post WHERE cod = :cod";
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

    public function ListarPost($inicio = null, $quantidade = null) {
        try {

            $sql = "SELECT *,
                    (SELECT categoria.titulo FROM categoria WHERE categoria.cod = post.categoria)  as ctitulo                             
                     FROM post ORDER BY cod DESC LIMIT :inicio, :quantidade";
            $param = array(":inicio" => $inicio, ":quantidade" => $quantidade);
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listarPost = [];
            foreach ($dt as $pst) {
                $post = new Post();
                $post->setCod($pst['cod']);
                $post->setTitulo($pst['titulo']);
                $post->setUrl($pst['url']);
                $post->getCategoria()->setTitulo($pst['ctitulo']);
                $post->setDescricao($pst['descricao']);
                $post->setValor($pst['valor']);
                $post->setStatus($pst['status']);
                $post->setThumb($pst['thumb']);
                $post->setData($pst['data']);

                $listarPost[] = $post;
            }
            return $listarPost;
        } catch (Exception $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //quantidades de posts
    public function RetornaQtdPost() {
        try {
            $sql = "SELECT count(pr.cod) as total FROM post pr";
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

    //retorno de post com imagem
    public function retornaPostImagem($cod) {
        try {
            $sql = "SELECT cod, titulo, data, thumb FROM post WHERE cod = :cod";
            $param = array(":cod" => $cod);
            //Data Table
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $post = new Post();
            $post->setCod($dt['cod']);
            $post->setTitulo($dt['titulo']);
            $post->setThumb($dt['thumb']);
            $post->setData($dt['data']);
            return $post;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna dados do post atraavés do cod
    public function retornaIdPost($cod) {
        try {
            $sql = "SELECT p.cod, p.titulo, p.categoria, p.url, p.descricao, p.valor, p.status, p.thumb, p.data,"
                    . " c.cod as codCat, c.titulo as tituloCat FROM post p "
                    . "INNER JOIN categoria c ON p.categoria = c.cod WHERE p.cod = :cod";

            $param = array(":cod" => $cod);
            //Data Table
            $pts = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $post = new Post();
            $post->setCod($pts['cod']);
            $post->setTitulo($pts['titulo']);
            $post->setUrl($pts['url']);
            $post->setDescricao($pts['descricao']);
            $post->setValor($pts['valor']);
            $post->setStatus($pts['status']);
            $post->setThumb($pts['thumb']);
            $post->setData($pts['data']);
            $post->getCategoria()->setCod($pts['codCat']);
            $post->getCategoria()->setTitulo($pts['tituloCat']);

            return $post;
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
            $sql = "UPDATE post SET thumb = :thumb WHERE cod = :cod";
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

    public function ListarTodosPosts() {
        try {
            $sql = "SELECT * FROM post WHERE status = 1 ORDER BY cod DESC ";

            $dt = $this->pdo->ExecuteQuery($sql);

            $listarPost = [];

            foreach ($dt as $pts) {
                $post = new Post();
                $post->setCod($pts['cod']);
                $post->setTitulo($pts['titulo']);
                $post->setUrl($pts['url']);
                $post->setDescricao($pts['descricao']);
                $post->setValor($pts['valor']);
                $post->setStatus($pts['status']);
                $post->setThumb($pts['thumb']);
                $post->setData($pts['data']);


                $listarPost[] = $post;
            }
            return $listarPost;
        } catch (Exception $exc) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function listarPostCat($categoria, $inicio = null, $quantidade = null) {


        try {
            $sql = "SELECT * FROM post WHERE categoria = :categoria AND status = 1 ORDER BY cod DESC LIMIT :inicio,:quantidade";
            $param = array(":categoria" => $categoria, ":inicio" => $inicio, ":quantidade" => $quantidade);
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listarPost = [];
            foreach ($dt as $pdr) {
                $post = new Post();
                $post->setCod($pdr['cod']);
                $post->setTitulo($pdr['titulo']);
                $post->setDescricao($pdr['descricao']);
                $post->setThumb($pdr['thumb']);
                $post->setUrl($pdr['url']);
                $post->setData($pdr['data']);
                $post->setCategoria($pdr['categoria']);
                $listarPost[] = $post;
            }
            return $listarPost;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()} , LINE{$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    /* CARREGANDO POST */

    public function ListarPostLimite($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT * FROM post ORDER BY cod DESC LIMIT :inicio, :quantidade";
            $param = array(
                ":inicio" => $inicio,
                ":quantidade" => $quantidade
            );
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listaPost = [];
            foreach ($dt as $pts) {
                $post = new Post();
                $post->setCod($pts['cod']);
                $post->setTitulo($pts['titulo']);
                $post->setUrl($pts['url']);
                $post->setThumb($pts['thumb']);
                $post->setDescricao($pts['descricao']);
                $post->setStatus($pts['status']);
                $post->setData($pts['data']);
                $listaPost[] = $post;
            }
            return $listaPost;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //RETORNA PRODUCT PELA URL
    public function retornaUrlPost($url) {
        try {
            $sql = "SELECT
                     p.cod, p.titulo, p.categoria, p.url, p.descricao, p.status, p.thumb, p.data,
                    c.cod as codCat, c.titulo as tituloCat, c.url as urlCat
                    FROM post p
                    INNER JOIN
                    categoria c 
                    ON p.categoria = c.cod 
                    WHERE p.url = :url";

            $param = array(":url" => $url);
            //Data Table
            $pts = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $post = new Post();
            $post->setCod($pts['cod']);
            $post->setTitulo($pts['titulo']);
            $post->setUrl($pts['url']);
            $post->setDescricao($pts['descricao']);
            $post->setStatus($pts['status']);
            $post->setThumb($pts['thumb']);
            $post->setData($pts['data']);
            $post->getCategoria()->setCod($pts['codCat']);
            $post->getCategoria()->setTitulo($pts['tituloCat']);            

            return $post;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna uma lista de pesquisa page index
    public function buscarPost() {
        try {
            $sql = "SELECT * FROM post WHERE titulo NOT LIKE 'a%' ";

            $dt = $this->pdo->ExecuteQuery($sql);
            
            $listarPost = [];

            foreach ($dt as $pts) {                
                $post = new Post();
                $post->setCod($pts['cod']);
                $post->setTitulo($pts['titulo']);
                $post->setUrl($pts['url']);
                $post->setDescricao($pts['descricao']);
                $post->setValor($pts['valor']);
                $post->setStatus($pts['status']);
                $post->setThumb($pts['thumb']);
                $post->setData($pts['data']);


                $listarPost[] = $post;
            }
            return $listarPost;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
