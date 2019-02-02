<?php
require_once './app/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?= $title; ?></title>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">        
        <meta name="description" content="Descubra como economizar e ficar completamente satisfeito com seu projeto contratando um Designer de Interiores O que você acha de realizar uma obra em sua casa ou escritório dentro do prazo estipulado"/>
        <meta name="keywords" content="ambiente arquiteta arquiteto arquitetura Boston Brasília, Leticia Garcia, cidade, clientes, construir, cronograma, desenho, designer, Designer de Interiores, detalhe economia, espaço, especialidade, especialistas, estilo, Exterior, fachadas, funcionalidade, honorários interiores, melhor ambiente Morar Mais obra, personalidade, planejamento, projetar, projetista, projeto, projetos, prêmio, responsabilidade, técnica, Sala Íntima, serviço, Sustentabilidade, Urbanismo."/>
        <meta name="author" content="Junio Santos"/>        
        <link rel="canonical" href="https://leticiagarcia.arq.br">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">        
        <link rel="icon" type="image/png" href="<?= INCLUDE_PATH; ?>/image/favicon.png" title="Letícia Garcia Arquiteta & Urbanismo" />                
        <link href="ccss/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/dnSlide.css">        
        <link href="<?= INCLUDE_PATH; ?>/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH; ?>/css/media.css" rel="stylesheet" type="text/css"/>        
    </head>    
    <body>

        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                    return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=1627648397302267&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>


        <!---------------------------- CABEÇALHO ------------------------>
        <header class="main-header container">
            <div class="content">
                <div class="div-header">
                    <div class="box-logo">
                        <h1 class="main-logo">
                            <a href="<?= HOME; ?>" title="Letícia Arquitetura & Urbanismo">
                                Letícia Arquitetura & Urbanismo
                            </a>
                        </h1>
                    </div>

                    <!------------------------------------------------------ MENU MOBI ------------------------------------------>
                    <div class="boxsidebar">                            
                        <!--                            <h2 class="main_logo fl-left font-zero">
                                                        <a href="<?= HOME; ?>" title="Leticia" class="radius">
                                                            Leticia
                                                        </a>
                                                    </h2>-->
                        <ul class="menu_mobile"> 
                            <li><a title="Home" href="<?= HOME; ?>">Home</a></li>
                            <li><a title="Quem Somos" href="<?= HOME; ?>/sobre">Sobre</a></li>
                            <li><a title="Pacotes" href="<?= HOME; ?>/portifolio">Projetos</a></li>
                            <li><a title="Pacotes" href="<?= HOME; ?>/blog">Blog</a></li>
                            <li><a title="Fale Conosco" href="<?= HOME; ?>/contato">Contato</a></li>
                        </ul>
                        <button class="boxsidebarBtn">
                            <span></span>
                        </button>
                    </div>

                    <div class="main_nav">
                        <u class="menu">
                            <li class="active"><a href="<?= HOME; ?>" title="Home">HOME</a></li>
                            <li><a href="<?= HOME; ?>/sobre" title="Sobre Letícia">SOBRE</a></li>
                            <li><a href="<?= HOME; ?>/portifolio" title="Portifólio">PROJETOS</a></li>
                            <li><a href="<?= HOME; ?>/blog" title="Blog">BLOG</a></li>
                            <li><a href="<?= HOME; ?>/contato" title="Contato">CONTATO</a></li>
                        </u>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </header>
        <!-- --------------------------------- conteudo ---------------------------- -->
        <?php
        $Url[1] = (empty($Url[1]) ? null : $Url[1]);
        if (file_exists(REQUIRE_PATH . '/' . $Url[0] . '.php')):
            require REQUIRE_PATH . '/' . $Url[0] . '.php';
        elseif (file_exists(REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php')):
            require REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php';
        else:
            require REQUIRE_PATH . '/404.php';
        endif;
        ?>
        <!-- --------------------------------- conteudo ---------------------------- --> 
        <!----------------------------- RODAPE ----------------------------------->
        <footer class="main-footer container">            
            <section class="sec-contact bg-gf-clear">
                <h1 class="font-zero">Contato Geral</h1>
                <div class="main-contact content txt-center">
                    <div class="contact">                        
                        <div class="block-contact">
                            <h4> <span>Nosso</span> Conteudo</h4>
                            <p><a href="<?= HOME; ?>/blog">Blog</a> </p>                            
                            <p><a href="<?= HOME; ?>/gleria">Galeria</a> </p>                            
                        </div>
                        <div class="block-contact">
                            <h4><span>Precisa</span> de Ajuda</h4>
                            <p>Entre em contato:</p>
                            <p><i class="fa fa-envelope"></i> lgarciainteriores@gmail.com</p>
                            <p><i class="fa fa-phone-square"></i>   cel. +55 (21) 986075175</p>
                        </div>
                        <div class="block-contact rede">
                            <h4><span>Rede</span> Social</h4>
                            <p><a href="https://www.facebook.com/lgarciainteriores"  target="_blank" class="farede">
                                    <i class="face">
                                        <img src="<?= INCLUDE_PATH; ?>/image/icon-face-f.png" alt=""/>
                                    </i></a>
                            </p>
                            <p><a href="https://www.instagram.com/lgarciainteriores" target="_blank" class="farede">
                                    <i>
                                        <img src="<?= INCLUDE_PATH; ?>/image/icon-instan.png" alt=""/>
                                    </i>
                                </a></p>
                        </div>
                        <div class="block-contact">
                            <h4><span>Curta </span>nossa Page</h4>
                            <div class="fb-page" data-href="https://www.facebook.com/pg/lgarciainteriores/photos/?ref=page_internal" data-tabs="timeline" data-width="200" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pg/lgarciainteriores/photos/?ref=page_internal" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pg/lgarciainteriores/photos/?ref=page_internal">LG Arquitetura e Interiores</a></blockquote></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </section>
            <center>
                <div class="copy bg-grafit-cl">                    
                    <p>&COPY; <?= date("Y"); ?>, <?= $copy; ?></p>                    
                    <p><?= $desenvolvedor; ?></p>
                </div>
            </center>
        </footer>

        <script src="<?= INCLUDE_PATH; ?>/js/jquery-3.2.1.min.js"></script>             
        <script src="<?= INCLUDE_PATH; ?>/js/slider_show.js"></script>                
        <script src="https://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
        <script src="<?= INCLUDE_PATH; ?>/js/fontawesome.js"></script>
        <script src="<?= INCLUDE_PATH; ?>/js/dnSlide.js"></script>
        <script src="<?= INCLUDE_PATH; ?>/js/slider.js"></script>
        <script src="<?= INCLUDE_PATH; ?>/js/expandJS.js"></script>
        <script src="<?= INCLUDE_PATH; ?>/js/scriptSite.js"></script>
        <script src="">
            
        </script>
        <script type="text/javascript">
            $(window).on('scroll', function(){
                if($(window).scrollTop()){
                    $('.main-header').addClass('black');
                }
                else{
                    $('.main-header').removeClass('black');
                }
            })
        </script>
    <cc lang = ’javascript’></cc>
</body>    
</html>