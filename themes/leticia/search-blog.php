<?php
$postController = new PostController();
$helper = new Helper();
$search = filter_input(INPUT_POST, "textoPesquisado", FILTER_SANITIZE_SPECIAL_CHARS);

$listarPesquisa = $postController->buscarPost();
?>
<main class="main-blog container">
    <div class="space-top"></div>

    <section class="sec-artigo content">
        <div class="new-box">           
            <div class="artigo-search">
                <?php
                if ($listarPesquisa == null):
                    ?>

                    <article class = "row-pacotes">
                        <h1 class="titulo_produto">Opsss, não existe esse produto cadastrado!</h1> 
                    </article> 
                    <?php
                else:
                    ?>
                    <?php
                    foreach ($listarPesquisa as $post):
                        ?>
                        <div class="thumb-search bg-white">
                            <div class="desc-artigo">
                                <h2><?= $helper->limitarTexto($post->getTitulo(), 25); ?></h2>
                                <span></span>
                            </div>

                            <div class="thumb-art">
                                <img src="upload/<?= $post->getThumb(); ?>" alt="" title="">
                                <div class="shadow-left sh-left"></div>
                                <div class="shadow-right sh-right"></div>
                            </div>

                            <div class="text-artigo txt-just">
                                <p style="color: #333 !important;">
                                    <?= html_entity_decode($helper->Words($post->getDescricao(), 3)); ?>
                                    
                                </p>
                            </div>                           
                        </div> 
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>            
        <div class="clear"></div>

    </section>
</main>