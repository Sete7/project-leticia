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
        $mailer->CharSet  = utf8_decode($mensagem);        
        $mailer->Host = 'mail.leticiagarcia.arq.br'; //smtp.dominio.com.br
        $mailer->Username = 'leticiacontato@leticiagarcia.arq.br';
        $mailer->Password = 'senha alguma coisa';

        $mailer->SetFrom("$email", "$nome"); //Seu e-mail
         $mailer->AddAddress('leticiacontato@leticiagarcia.arq.br', 'Page Erro Site');               
         $mailer->AddAddress('lgarciainteriores@gmail.com');               
        $mailer->Subject = "Formulario Pagina Erro 404"; //Assunto do e-mail      
        $mailer->isHTML(true); 
        $mailer->Body .= "<br><br/> "
                . "Nome:  $nome <br><br/>"
                . "Email: $email <br><br/>"
                . "Telefone: $telefone <br><br/>"
                . "Mensagem: $mensagem <br><br/>";
        
        //Define o corpo do email        
        $mailer->Send();
        echo "<script>alert('Sr(a) $nome sua mensagem foi enviada com sucesso! Em breve entraremos em contato!');</script>";
        echo "<script>window.location = 'http://leticiagarcia.arq.br/projeto'</script>";
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }
endif;
?>
<form class = "form_error" id = "form_contato" name = "form" method = "POST" action = "">
<label for = "nome">NOME</label>
<input type = "text" name = "txtnome" id = "nome" class = "nome" required="">
<label for = "email">EMAIL</label>
<input type = "email" name = "txtemail" class = "email" id = "email" required="">
<label for = "telefone">TELEFONE</label>
<input type = "tel" name = "txtfone" id = "telefone" class = "telefone" required = "">
<label for = "txtmsg">SUGESTÃO</label>
<textarea id = "txtmsg" name = "txtmsg" class = "textSugestao" cols = "100" rows = "5" required=""></textarea>
<input type = "submit" name = "btnEnviar" class = "btn-404" onclick = "return validar()" value = "ENVIAR">
</form>