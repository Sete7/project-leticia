<?php

//verificando a url e esta voltando url[0] = single, url[1] = exemplo-do-post
$url = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$url = ($url ? $url : 'index');
$url = explode('/', $url);
$urlPost = $url[1];

$projeto = new Post();
$projetoController = new PostController();
$helper = new Helper();

$listarProjeto = $projetoController->retornaUrlPost($urlPost);
if ($listarProjeto == null):
    echo 'Não existe projeto cadastrado';

else:
    $cod = $listarProjeto->getCod();
    $codCategoria = $listarProjeto->getCategoria()->getCod();
    $nomeCategoria = $listarProjeto->getCategoria()->getTitulo();
    $thumb = $listarProjeto->getThumb();
    $titulo = html_entity_decode($listarProjeto->getTitulo());
    $data = $listarProjeto->getData();
    $descricao = html_entity_decode($listarProjeto->getDescricao());
    ?>
    <main class="main-sg-project container">
        <section class="sec-project">
            <h1 class="font-zero">Todos os projetos</h1>
            <div class="content-project content">
                <article class="box-sg-port">
                    <div class="box-sg-pj">
                        <div class="thumb-sg-pj">
                            <h2><?= $titulo; ?></h2>
                            <span><?= $helper->converteData($data); ?></span>                        
                            <img src="<?= HOME; ?>/tim.php?src=upload/<?= $thumb; ?>&w=620&h=420&zc=0" alt="" title="<?php $titulo ?>">
                        </div>
                        <div class="desc-ssingle">
                            <p>
                                <?= $descricao; ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </article>
            <?php
            endif;
            ?>
            <aside class="sbar-project">  
                <div class="box-sg-msg">
                    <div class="box-sg-msg-pj">
                        <h2>Fique por dentro!</h2>
                        
                        <form class="form-pj" method="POST">
                            <input type="email" class="ipt-email" name="txtemail" placeholder="Endereço de email">
                            <i class="fa fa-envelope"></i>
                            <input type="submit" name="btnEnviar" class="btnSgEscreva" value="Inscreva-se">
                        </form>
                        
                    </div>
                </div>
                <?php
                $projetoSidebar = $projetoController->ListarPostLimite(0, 4);
                foreach ($projetoSidebar as $sbProject):
                    ?>
                    <div class="list-sg-pj">                       
                        <div class="box-sg-desc-pj">
                            <a href="<?= HOME; ?>/single-portifolio/<?= $sbProject->getUrl(); ?>">
                                <img src="<?= HOME; ?>/tim.php?src=upload/<?= $sbProject->getThumb(); ?>&w=80&h=60&zc=0" alt="" title="<?= $sbProject->getTitulo(); ?>">
                            </a>
                            <div class="desc-sg-pj">
                                <a href="<?= HOME; ?>/single-portifolio/<?= $sbProject->getUrl(); ?>">
                                    <h3><?php echo $helper->limitarTexto($sbProject->getTitulo(), 15); ?></h3>
                                </a>
                                <div class="text-sg">
                                    <p><?php echo $helper->Words(html_entity_decode($sbProject->getDescricao()), 2); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </aside>

            <div class="clear"></div>
        </div>
    </section>
</main>