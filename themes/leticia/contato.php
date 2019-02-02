<section class="sec-page-contact">
    <div class="content">
        <div class="description-page">
            <h1>Letícia Arquiteta & Interiores | Contato</h1>
        </div>
    </div>
</section>
<main class="main_content">
    <section class="page-contant">
        <div class="content">
            <div class="title-header">
                <h1>BEM VINDO A NOSSA PÁGINA DE CONTATO</h1>
                <p class="tagline">
                    Deixe sua dúvida, sugestão, reclamação ou faça um orçamento. 
                </p>                                                        
                <div class="clear"></div>
            </div>
            <div class="box-contact">
                <article class="art-form">
                    <h2>Por favor, preencha o formulário abaixo para entrar em contato conosco.</h2>
                    <?php
                    require_once './mailer/form-contato.php';
                    ?>                   
                </article>

                <aside class="aside-contact">
                    <h2>Informe Geral</h2>
                    <p><strong><i class="fa fa-map"></i> Endereço: </strong>  Rua da Conceição 125 - sala 808 - Centro, Niterói - RJ</p>                    
                    <p><strong><i class="fa fa-map-marker"></i> Cep: </strong> 24020-085</p>                    
                    <p><strong><i class="fa fa-phone-square"></i> Telefone: </strong> +55 (21) 986075175</p>                    
                    <p><strong><i class="fa fa-envelope"></i> Email: </strong> lgarciainteriores@gmail.com</p>                    
                    <p><strong><i class="fa fa-envelope"></i> Email: </strong> leticiacontato@leticiagarcia.arq.br</p>                    
                    <p><strong><i class="fa fa-globe"></i> Site: </strong>www.leticiagarcia.arq.br</p>
                    <div class="lista-social">
                        <ul>
                            <li><a href="https://www.facebook.com/lgarciainteriores"  target="_blank" class="faface">
                                    <i class="icone-rede">
                                        <img src="<?= REQUIRE_PATH; ?>/image/icon-face-f.png" alt=""/>
                                    </i></a></li>

                            <li><a href="https://www.instagram.com/lgarciainteriores"  target="_blank" class="fainstan">
                                    <i class="icone-rede">
                                        <img src="<?= REQUIRE_PATH; ?>/image/icon-instan.png" alt=""/>
                                    </i></a></li>                            
                        </ul>
                    </div>            
                </aside>
            </div>
            <div class="clear"></div>
        </div>
    </section>
</main>

