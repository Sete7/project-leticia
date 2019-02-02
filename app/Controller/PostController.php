<?php

    class PostController {

    private $PostDAO;

    public function __construct() {
        $this->PostDAO = new PostDAO;
    }

    //    ***************************************METODOS DAO DO PAINEL**************************************************
    public function Cadastrar(Post $post) {
        if (strlen($post->getTitulo()) > 3 && $post->getCategoria() != '' && strlen($post->getStatus()) > 0 && strlen($post->getStatus()) <= 3 && strlen($post->getDescricao()) > 10  && $post->getThumb() != ''):       
            return $this->PostDAO->Cadastrar($post);        
        else:
            return false;
        endif;
    }

    public function Atualizar(Post $post) {
        return $this->PostDAO->Atualizar($post);
    }

    public function ListarPost($inicio = null, $quantidade = null) {
        return $this->PostDAO->ListarPost($inicio, $quantidade);
    }

    public function Excluir($cod) {
        if ($cod > 0):
            return $this->PostDAO->Excluir($cod);
        else:
            return false;
        endif;
    }

    //quantidades de produtos
    public function RetornaQtdPost() {
        return $this->PostDAO->RetornaQtdPost();
    }

    public function retornaPostImagem($cod) {
        return $this->PostDAO->retornaPostImagem($cod);
    }

    //retorna dados do produto atraves do cod
    public function retornaIdPost($cod) {
        if ($cod > 0):
            return $this->PostDAO->retornaIdPost($cod);
        else:
            return false;
        endif;
    }

    public function AlterarImagem($cod, $thumb) {
        return $this->PostDAO->AlterarImagem($cod, $thumb);
    }

    public function ListarTodosPosts() {
        return $this->PostDAO->ListarTodosPosts();
    }
    
     public function ListarPostLimite($inicio = null, $quantidade = null) {
         return $this->PostDAO->ListarPostLimite($inicio, $quantidade);
     }
    
     public function listarPostCat($categoria, $inicio = null, $quantidade = null) {
         return $this->PostDAO->listarPostCat($categoria,$inicio, $quantidade);
     }
     
     public function retornaUrlPost($url) {
         return $this->PostDAO->retornaUrlPost($url);
     }
      public function buscarPost() {
          return $this->PostDAO->buscarPost();
      }

}
