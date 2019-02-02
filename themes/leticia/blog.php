<?php

$artigo = new Artigo();
$artigoController = new ArtigoController();
$helper = new Helper();
$listaArtigo = $artigoController->ListarArtigoLimite(0, 6);

?>
<section class="sec-page-blog">
    <div class="content">
        <div class="description-page">
            <h1>Letícia Arquiteta & Interiores | Blog</h1>
        </div>
    </div>
</section>
<main class="main-blog container">
    <section class="sec-blog content">
        <div class="new-box">
            <div class="box-search">
                <form class="form-search" method="POST" action="<?= HOME ?>/search-blog">                    
                    <input type="search" class="search" name="titulo" placeholder="Search Site">
                    <button class="btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div class="box-blog">
                <div class="artigo">
                    <?php
                    foreach ($listaArtigo as $artigo):
                        ?>
                        <div class="thumb-blog bg-white">
                            <div class="desc-blog">
                                <h2><a href="<?= HOME; ?>/single-blog"><?= $artigo->getTitulo(); ?></a></h2>
                                <span> <?php echo $helper->converteData($artigo->getData()); ?></span>
                            </div>

                            <a href="<?= HOME; ?>/single-blog/<?= $artigo->getUrl(); ?>" class="link-thumb">
                                <img src="<?= HOME; ?>/upload/<?= $artigo->getThumb(); ?>" alt="" title="<?= $artigo->getTitulo(); ?>">
                                <div class="shadow-left sh-left"></div>
                                <div class="shadow-right sh-right"></div>
                            </a>

                            <div class="text-blog txt-just">
                                <?php echo $helper->Words(html_entity_decode($artigo->getDescricao()), 6); ?>
                            </div>
                            <div class="box-btn-mais">
                                <a href="<?= HOME; ?>/single-blog/<?= $artigo->getUrl(); ?>" class="btn-mais">Mais</a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>

                </div>
            </div>

            <aside class="aside-blog">
                <h1 class="font-zero">Descriççao Recente</h1>
                <div class="box-msg  bg-white">
                    <div class="box-msg-blog">
                        <h2>Fique por dentro!</h2>
                        <form class="form-blog" method="POST">
                            <input type="email" class="ipt-email" name="email" placeholder="Endereço de email">
                            <i class="fa fa-envelope"></i>
                            <input type="submit" class="btnEscreva" value="Inscreva-se">
                        </form>
                    </div>
                </div>
                <div class="artigo">
                    <h2>Artigos Recentes</h2>
                    <?php
                    foreach ($listaArtigo as $artigo):
                        ?>
                        <div class="list-artigo">                       
                            <div class="box-artigo">
                                <a href="<?= HOME; ?>/single-blog/<?= $artigo->getUrl(); ?>">
                                    <img src="<?= HOME; ?>/upload/<?= $artigo->getThumb(); ?>" alt="" title="<?= $artigo->getTitulo(); ?>">    
                                </a>
                                <div class="desc-artigo">
                                    <a href="<?= HOME; ?>/single-blog/<?= $artigo->getUrl(); ?>">
                                        <h3><?= $artigo->getTitulo(); ?></h3>
                                    </a>
                                    <p><?php echo $helper->Words(html_entity_decode($artigo->getDescricao()), 2); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>

                <div></div>
            </aside>
            <div class="clear"></div>
        </div>
    </section>
</main>