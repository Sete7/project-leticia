<?php
$categoriaController = new CategoriaController();
$sliderController = new SliderController();
$post = new Post();
$postController = new PostController();
$artigoController = new ArtigoController();
$helper = new Helper();
?>
<!---------------------------- SLYDE ------------------------>
<?php
$sliderController = new SliderController();
?>
<main class="main_content container">
    <section class="slider container">

        <h1 class="font-zero">Últimas do site:</h1>
        <div class="slider_controll" style="display: none;">
            <div class="slide_nav back"><<</div>
            <div class="slide_nav go">>></div>
        </div>
        <?php
        $controle_active = 2;
        $tamMobile = "g";
        $sliderMobile = $sliderController->ListarTamanhoSlider($tamMobile);
        foreach ($sliderMobile as $sli):
            if ($controle_active == 2):
                ?>
                <article class="slider_item first">
                    <a href="<?= $sli->getSlider_link(); ?>" title="<?= $sli->getSlider_titulo(); ?>">
                        <picture alt="Fortaleza">
                            <source media="(min-width: 1280px)" srcset="tim.php?src=uploads/01.jpg&w=1366&h=400" />
                        </picture>
                        <img src="<?= HOME; ?>/upload/<?= $sli->getSlider_thumb(); ?>" alt="" title="<?= $sli->getSlider_titulo(); ?>" style="float: left;" style="float: left;">
                    </a>
                </article>
                <?php
                $controle_active = 1;
            else:
                ?>
                <article class="slider_item">
                    <a href="<?= $sli->getSlider_link(); ?>" title="<?= $sli->getSlider_titulo(); ?>">
                        <picture alt="Fortaleza">
                            <source media="(min-width:1600px)" srcset="tim.php?src=uploads/01.jpg&w=200&h=600">
                        </picture>
                        <img src="<?= HOME; ?>/upload/<?= $sli->getSlider_thumb(); ?>" alt="" title="<?= $sli->getSlider_titulo(); ?>" style="float: left;">
                    </a>
                </article>
            <?php
            endif;
        endforeach;
        ?>
    </section>
</main>

<!-------------------------------- CONTEUDO PRINCIPAL -------------------------->   
<main class="main_content container">
    <section class="main-description">
        <h1 class="font-zero">Descrição Leticia</h1>
        <div class="content">
            <?php
            $listarPostCat = $postController->listarPostCat(13, 0, 3);
            foreach ($listarPostCat as $projeto):
                ?>

                <div class="box-desc">
                    <div class="blclrows-i">                        
                        <img  src="<?= HOME; ?>/tim.php?src=upload/<?= $projeto->getThumb(); ?>" alt="" title="<?php echo $projeto->getTitulo(); ?>">
                    </div>
                    <h3><?php echo $helper->Words(html_entity_decode($projeto->getTitulo()), 3); ?></h3>
                </div>
                <?php
            endforeach;
            ?>
            <div class="clear"></div>
        </div>
    </section>

    <!-------------------------- PROJETOS DIVERSOS ------------------------>
    <section class="sec-sobre content">
        <h1 class="font-zero">Missão</h1>        
        <article class="artic-about">
            <h2> MISSÃO</h2>
            <p>
                Na LG Arquitetura, acreditamos firmemente que o sucesso de um trabalho 
                está intrinsecamente ligado às características individuais de cada projeto,
                procurando nos guiar sempre pelas aspirações do cliente, sua história,
                e a locação do projeto, aliados à diversidade da nossa experiência,
                utilizando soluções específicas e únicas para cada caso.
            </p>
        </article>        
    </section>

    <section class="sec-next-project content">
        <h1 class="font-zero">Principais do Site</h1>        

        <article class="last-project">            
            <div class="title-header">
                <h3>PROJETOS RECENTES</h3>
                <p class="tagline">
                    A empresa vem se destacando no mercado de Brasília como sendo uma empresa
                    que atua nas áreas de projetos de arquitetura, projetos de interiores,
                    projetos comercial e principalmente na execução & acompanhamento de obras.
                </p>                                        
                <div class="clear"></div>
            </div>

            <?php
            $cat = $categoriaController->ListarCategoria(0, 4);
            foreach ($cat as $listCategory):
                ?>
                <?php
                if ($listCategory == null):

                else:
                    $category = $listCategory->getCod();
                    $listarPostCat = $postController->listarPostCat($category, 0, 4);
                    foreach ($listarPostCat as $projeto):
                        ?>
                        <div class="last-house-interior bg-white">                    

                            <a href="<?= HOME; ?>/single-portifolio/<?= $projeto->getUrl(); ?>" class="link-thumb">
                                <img src="<?= HOME; ?>/tim.php?src=upload/<?= $projeto->getThumb(); ?>&w=300&h=200&zc=0" alt="" title="">
                                <div class="shadow-left sh-left"></div>
                                <div class="shadow-right sh-right"></div>
                            </a>

                            <div class="text-blog txt-just">
                                <p style="color: #333;">
                                    <?php echo $helper->Words(html_entity_decode($projeto->getDescricao()), 5); ?>                        
                                </p>
                            </div>

                            <div class="box-btn-mais">
                                <a href="<?= HOME; ?>/single-portifolio/<?= $projeto->getUrl(); ?>" class="btn-mais">Mais</a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
                <?php
            endforeach;
            ?>

        </article>
        <div class="clear"></div>
    </section>


    <!-------------------------- PROJETOS DIVERSOS ----------------------> 
    <section class="sec-rows-project bg-gelo container">
        <h1 class="font-zero">Principais do Site</h1>        

        <article class="thumb-project">
            <div class="title-box">
                <h2><span>Mais</span> Vistos</h2>                        
            </div>
            <div class="box-thumb"> 
                <?php
                $listarPostCat = $postController->ListarPost(0, 15);
                foreach ($listarPostCat as $projeto):
                    ?>
                    <a href="<?= HOME; ?>/portifolio" class="mirros">
                        <img src="<?= HOME; ?>/tim.php?src=upload/<?= $projeto->getThumb(); ?>&w=300&h=200&zc=0" alt="" title="">                                                                                 
                        <div class="layer-thumb txt-center">
                            <h3><?php echo $helper->Words(html_entity_decode($projeto->getTitulo()), 3); ?></h3>
                        </div>
                    </a>
                    <?php
                endforeach;
                ?>

            </div>
        </article>
        <div class="clear"></div>
    </section>
    <section class="sec-serv container">
        <h1 class="font-zero">Blog</h1>
        <div class="content">
            <article class="art-serv">
                <h2>Serviços</h2>
                <div class="box-serv">
                    <?php
                    $listarBlog = $artigoController->ListarArtigoLimite(0, 5);
                    foreach ($listarBlog as $artigo):
                        ?>
                        <div class="thumb-serv">
                            <a href="<?= HOME; ?>/single-blog/<?= $artigo->getUrl(); ?>" class="thumb-img">
                                <img src="<?= HOME; ?>/tim.php?src=upload/<?= $artigo->getThumb(); ?>&w=300&h=200&zc=0" alt="" title="">
                            </a>
                            <div class="desc-serv">
                                <h3><a href="<?= HOME; ?>/single-blog/<?= $artigo->getUrl(); ?>"><i class="fa fa-angle-double-right"></i></a><strong><?= $artigo->getTitulo(); ?></strong></h3>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <div class="clear"></div>
            </article>
        </div>
    </section>

    <footer class="footer-main bg-gf-clear">
        <div class="content">
            <h1 class="font-zero">Mais Sobre Leticia</h1>
            <article class="newslleter">
                <div class="title-header-one">
                    <h1>NEWSLLETER</h1>
                    <p class="tagline">
                        Receba Novidades em seu Email
                    </p>                                        
                </div>

                <form class="form-newslleter">                        
                    <input type="email" name="email" class="ipt-mail" placeholder="Email" required=""/>
                    <input type="submit" class="btn-news" value="Enviar"/>
                </form>
            </article>
            <div class="clear"></div>
        </div>
    </footer>
</main>
