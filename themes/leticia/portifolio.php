<?php
$categoria = new Categoria();
$categoryController = new CategoriaController();
$post = new Post();
$postController = new PostController();
$helper = new Helper();
?>
<section class="sec-page-port">
    <div class="content">
        <div class="description-page">
            <h1>Letícia Arquiteta & Interiores | Portifólio</h1>
        </div>
    </div>
</section>
<main class="main_port container">
    <section class="page-portifolio">
        <h1 class="font-zero">Todos os projetos</h1>
        <div class="box-port content">

            <?php
            $listCategory = $categoryController->ListarTodasCategorias();
            foreach ($listCategory as $tipoCategory):
                ?>
                <article class="box-thumb-port">
                    <div class="title-project">
                        <h1><?= $tipoCategory->getTitulo(); ?></h1>
                    </div>
                    <?php
                    $cat = $tipoCategory->getCod();
                    $listarPostCat = $postController->listarPostCat($cat, 0, 500);
                    if ($listarPostCat == null):
                    else:
                        foreach ($listarPostCat as $projeto):
                            ?>
                            <a width="250px" href="<?= HOME; ?>/single-portifolio/<?= $projeto->getUrl(); ?>" class="link-thumb-single txt-center">
                                <img src="<?= HOME; ?>/tim.php?src=upload/<?= $projeto->getThumb(); ?>&w=300&h=200&zc=0" alt="" title="">
                            </a>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </article>
                <?php
            endforeach;
            ?>

            <div class="clear"></div>
        </div>
    </section>
</main>