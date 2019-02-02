<?php
//verificando a url e esta voltando url[0] = single, url[1] = exemplo-do-post
$url = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$url = ($url ? $url : 'index');
$url = explode('/', $url);
$urlCod = $url[1];

$artigo = new Artigo();
$artigoController = new ArtigoController();
$helper = new Helper();
$listaArtigo = $artigoController->retornaUrlArtigo($urlCod);
if ($listaArtigo == null):
    echo 'Não existe post cadastrado';
else:
    $codProd = $listaArtigo->getCod();
    $titulo = $listaArtigo->getTitulo();
    $thumb = $listaArtigo->getThumb();
    $data = $listaArtigo->getData();
    $descricao = html_entity_decode($listaArtigo->getDescricao());
    ?>
    <main class="main-blog container">
        <div class="space-top"></div>

        <section class="sec-artigo content">
            <div class="new-box">           

                <div class="sing-artigo">
                    <div class="artigo">
                       
                            <div class="thumb-artigo bg-white">
                                <div class="desc-artigo">
                                    <h2><?= $titulo; ?></h2>
                                    <span><?= $helper->converteData($data); ?></span>
                                </div>

                                <div class="thumb-art">
                                    <img src="../upload/<?= $thumb; ?>" alt="<?= $titulo ?>" title="<?= $titulo ?>"/>
                                    <div class="shadow-left sh-left"></div>
                                    <div class="shadow-right sh-right"></div>
                                </div>

                                <div class="text-artigo txt-just">
                                    <p>
                                        <?= $descricao; ?>
                                    </p>
                                </div>                           
                            </div>                           

                    </div>
                </div>
            <?php
            endif;
            ?>

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
                $artigo = $artigoController->ListarArtigoLimite(0, 5);
                foreach ($artigo as $sidebar):
                    ?>
                        <div class="list-artigo">                       
                            <div class="box-artigo">
                                <a href="<?= HOME; ?>/single-blog/<?= $sidebar->getUrl(); ?>">
                                    <img src="<?= HOME; ?>/tim.php?src=upload/<?= $sidebar->getThumb(); ?>&w=80&h=60&zc=0" alt="<?= $sidebar->getTitulo(); ?>">    
                                </a>
                                <div class="desc-artigo">
                                    <a href="<?= HOME; ?>/single-blog/<?= $sidebar->getUrl(); ?>">
                                        <h3><?php echo $helper->limitarTexto($sidebar->getTitulo(), 15); ?></h3>
                                    </a>
                                    <p>
                                        <?php echo $helper->Words(html_entity_decode($sidebar->getDescricao()), 2); ?>
                                    </p>
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