<?php

    class ArtigoController {

    private $ArtigoDAO;

    public function __construct() {
        $this->ArtigoDAO = new ArtigoDAO;
    }

    //    ***************************************METODOS DAO DO PAINEL**************************************************
    public function Cadastrar(Artigo $artigo) {
        if (strlen($artigo->getTitulo()) > 3 && strlen($artigo->getStatus()) > 0 && strlen($artigo->getStatus()) <= 3 && strlen($artigo->getDescricao()) > 10  && $artigo->getThumb() != ''):
            return $this->ArtigoDAO->Cadastrar($artigo);
        else:
            return false;
        endif;
    }

    public function Atualizar(Artigo $artigo) {
        return $this->ArtigoDAO->Atualizar($artigo);
    }

    public function ListarArtigo($inicio = null, $quantidade = null) {
        return $this->ArtigoDAO->ListarArtigo($inicio, $quantidade);
    }

    public function Excluir($cod) {
        if ($cod > 0):
            return $this->ArtigoDAO->Excluir($cod);
        else:
            return false;
        endif;
    }

    //quantidades de produtos
    public function RetornaQtdArtigo() {
        return $this->ArtigoDAO->RetornaQtdArtigo();
    }

    public function retornaArtImagem($cod) {
        return $this->ArtigoDAO->retornaArtImagem($cod);
    }

    //retorna dados do produto atraves do cod
    public function retornaIdArtigo($cod) {
        if ($cod > 0):
            return $this->ArtigoDAO->retornaIdArtigo($cod);
        else:
            return false;
        endif;
    }

    public function AlterarImagem($cod, $thumb) {
        return $this->ArtigoDAO->AlterarImagem($cod, $thumb);
    }

    public function ListarTodosArtigos() {
        return $this->ArtigoDAO->ListarTodosArtigos();
    }
    
     public function ListarArtigoLimite($inicio = null, $quantidade = null) {
         return $this->ArtigoDAO->ListarArtigoLimite($inicio, $quantidade);
     }
    
     public function retornaUrlArtigo($url) {
         return $this->ArtigoDAO->retornaUrlArtigo($url);
     }
      public function buscarArtigo() {
          return $this->ArtigoDAO->buscarArtigo();
      }

}
