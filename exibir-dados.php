<?php
    if (isset($_POST["acao"])){
        $nome=$_POST["nome"];
        $telefone=$_POST["telefone"];
        $email=$_POST["email"];
        $select=$_POST["eu gostaria de:"];
        $msg=$_POST["mensagem"];

        echo "<p>Olá, ".$nome."</p>";
        echo "<p>Seu email é: ".$email."</p>";
        echo "<p>Seu telefone é: ".$telefone."</p>";
        if ($radio=="Agendar uma visita"){
            echo "<p>Você escolheu agendar uma visita</p>";
        }elseif ($radio=="Fazer uma doação") {
            echo "<p>Você escolheu fazer uma doação</p>";
        }
        if ($select=="Receber kit"){
            echo "<p>Você escolheu receber kit</p>";
        }elseif ($select=="Doar itens"){
            echo "<p>Você escolheu doar itens</p>";
        }if ($select=="Voluntário"){
            echo "<p>Você escolheu voluntário</p>";
        }elseif ($select=="Outro"){
            echo "<p>Você escolheu outro</p>";
        }
        echo "<p>Sua mensagem é:<br/>".$msg."</p>";

    }
?>

<?php
    // Criando nossas variáveis para guardar as informações do formulário
    $nome=$_POST["nome"];
    $sobrenome=$_POST["sobrenome"];
    $pais=$_POST["pais"];
    $numero=$_POST["numero"];
    $email=$_POST["email"];
    $opcoes=$_POST["opcoes"];
    $msg=$_POST['mensagem'];
    // formatando nossa mensagem (que será enviada ao e-mail)
    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$nome.'<br>';
    $mensagem.='<b>Sobrenome:</b> '.$sobrenome.'<br>';    
    $mensagem.='<b>País:</b> '.$pais.'<br>';
    $mensagem.='<b>Telefone:</b> '.$numero.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    $mensagem.='<b>Eu gostaria de:</b> '.$opcoes.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$msg;
    // abaixo as requisições do arquivo phpmailer
    require("phpmailer/src/PHPMailer.php");
    require("phpmailer/src/SMTP.php");
    require ("phpmailer/src/Exception.php");

    // chamando a função do phpmailer

$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'mail.nomedoservidor.com';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'email@seudominio.com.br';   //SEU USUÁRIO DE EMAIL
    $mail->Password   = '0123456';                   //SUA SENHA DO EMAIL SMTP password
    $mail->SMTPSecure = 'ssl';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM
    $mail->Port       = 465;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipients
    $mail->setFrom('email@seudominio.com.br', 'Site');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('learnidiomaslx@gmail.com');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    $mail->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT

    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('Erro ao enviar o E-Mail');window.location.assign('index.php');</script>";
     }else{
        echo "<script>alert('E-Mail enviado com sucesso!');window.location.assign('index.php');</script>";
     }
     die
?>