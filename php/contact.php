<?php
    $email = $nom = $prenom = $message = $emailError = $nomError = $prenomError = $messageError = "";

    if ( isset ($_POST['submit'])){
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $message = $_POST['message'];
    }



    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "../vendor/autoload.php";
    $mail = new PHPMailer(true);

    try {
     
    // Autentification avec SMTP
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    // Connexion
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 465;
    $mail->Username = 'webmaster@cassandra-svd.fr';
    $mail->Password = 'Depourvue83@';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    // Destinataires de l'email
    $mail->setFrom('webmaster@cassandra-svd.fr', 'Cassandra');
    $mail->addAddress('cassandra.sciauvaud@hotmail.fr');
    
    // Ajout du contenue de l'email
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(false);
    $mail->Subject = 'Mail de votre site';
    $mail->Body = $_POST['email'] . $_POST['nom']  . $_POST['message'];
    

    // Envoi de l'email
    $mail->send();
    echo 'Message envoyé';
} catch (Exception $e) {
    echo $e->errorMessage(); //error messages from PHPMailer
} catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
    echo $e->getMessage(); //Boring error messages from anything else!
}

?>