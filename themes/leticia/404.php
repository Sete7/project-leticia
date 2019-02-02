<section class="sec-error container">    
    <div class="box-error">
        <h1>Opss! Alguma coisa aconteceu!</h1>
        <div class="content">
            <h3>Continue navegando em nosso site.</h3>
            <p>
                Uma página de error <strong>404</strong> foi encontrada em nosso site, continue navegando e
                não deixe de informar uma sugestão ou reclamação, estou aqui 
                para melhor atendê-lo.
            </p>
            
            <?php
            require_once './mailer/form-error.php';
            ?>
        </div>
    </div>
</section>
