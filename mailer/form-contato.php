<?php
require_once('./mailer/class.phpmailer.php');

$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if ($btnEnviar):
    $nome = utf8_decode(strip_tags(trim($_POST['txtnome'])));
    $email = utf8_decode(strip_tags(trim($_POST['txtemail'])));
    $telefone = utf8_decode(strip_tags(trim($_POST['txtfone'])));    
    $mensagem = html_entity_decode(filter_input(INPUT_POST, 'txtmsg', FILTER_SANITIZE_STRING));

    try {
        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->SMTPDebug = 1;
        $mailer->SMTPAuth = true;
        $mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails
        $mailer->CharSet = utf8_decode($mensagem);
        $mailer->Host = 'mail.leticiagarcia.arq.br'; //smtp.dominio.com.br
        $mailer->Username = 'leticiacontato@leticiagarcia.arq.br';
        $mailer->Password = 'contato';
        $mailer->SMTPSecure = 'tls';
        

        $mailer->SetFrom("$email", "$nome"); //Seu e-mail
        $mailer->AddAddress('leticiacontato@leticiagarcia.arq.br', 'Contato Site');        
        $mailer->AddAddress('lgarciainteriores@gmail.com');
        $mailer->Subject = "Formulario Contato"; //Assunto do e-mail      
        $mailer->isHTML(true);
        $mailer->Body .= "<br><br/> "
                . "Nome:  $nome <br><br/>"
                . "Email: $email <br><br/>"
                . "Telefone: $telefone <br><br/>"                
                . "Mensagem: $mensagem <br><br/>";

        //Define o corpo do email        
        $mailer->Send();
        echo "<script>alert('Sr(a) $nome sua mensagem foi enviada com sucesso! Em breve entrarei em contato!');</script>";
//        echo "<script>window.location = 'https://leticiagarcia.arq.br/contato'</script>";
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }
endif;
?> 
<div class="error">
    <p class="error" style="display: none;">Campo invalido</p>
</div>

<form class="form-contact" method="POST">
    <input type="text" name="txtnome" placeholder="Nome*" required=""/>
    <input type="email" name="txtemail" placeholder="Email*" required=""/>
    <input type="tel" name="txtfone" placeholder="Telefone*" required=""/>
    <textarea rows="5" cols="50" name="txtmsg" placeholder="Mensagem*" required=""></textarea> 
    <input type="submit" class="btnContact" name="btnEnviar" value="Enviar">
</form> 
