<?php

sleep(1);
require_once '../app/config.php';

$postController = new PostController();
$helper = new Helper();

switch ($_POST['acao']):

    case 'ler':
        $offset = $_POST['offset'];
        $limit = $_POST['limit'];

        $postPacotes = $postController->listarPostCat(7, $offset, $limit);
        if ($postPacotes != null):
            foreach ($postPacotes as $post):               
             
                echo '<a href = "./single/' . $post->getUrl() . '" class = "box-thumb-pac  anime anime-init">';
                
                echo '<h1>' . $helper->converteData($post->getData()) . '</h1>';
         
                echo '<div class = "thumb-pacote">';
                
                echo '<img src="tim.php?src=upload/' . $post->getThumb() . '&w=720&h=500&zc=1" title="' . $post->getTitulo() . '" alt="' . $post->getTitulo() . '">';
                
                echo '<div class = "box-hover-pacotes">';
                
                echo '<button class = "btn btn-veja">Confira</button>';
                
                echo '</div>';
                
                echo '</div>';
                
                echo '<h1>' . $helper->limitarTexto(html_entity_decode($post->getTitulo()), 25) . '</h1>';
                
                echo '</a>';
              
            endforeach;
        else:
            echo '3';
        endif;
        break;

    default :
        echo '2';
endswitch;








