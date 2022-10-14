<?php 

    $array = array("prenom" => "", "nom" => "", "email" => "", "message" => "", "prenomError" => "", "nomError" => "", "emailError" => "", "messageError" => "", "isSucces" => false);

    $emailTo = "cassandra.sciauvaud@hotmail.fr";
    $objet = "Un message de votre site";
    $headers = "From: {$array['prenom']} {$array['nom']} <{$array['email']}>\r\nReply-To: {$array['email']}";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["prenom"] = test_input($_POST["prenom"]);
        $array["nom"] = test_input($_POST["nom"]);
        $array["email"] = test_input($_POST["email"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true;
        $emailText = "";

        if(empty($array["prenom"]))
        {
            $array["prenomError"] = "Je veux connaitre votre prénom";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Prenom: {$array['prenom']}\n";  
        }

        if(empty($array["nom"]))
        {
            $array["nomError"] = "Et oui, je veux même savoir votre nom";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Nom: {$array['nom']}\n";  
        }

        if(!isEmail($array["email"]))
        {
            $array["emailError"] = "Oups, il y a un problème avec votre e-mail";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Email: {$array['email']}\n";  
        }

        if(empty($array["message"]))
        {
            $array["messageError"] = "Que voulez vous me dire ?";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Message: {$array['message']}\n";  
        }

        if($array["isSucces"])
        {
            mail($emailTo, $objet, $emailText, $headers);
        } 
         
        if (mail($emailTo, $objet, $emailText, $headers)) {
            echo "Email envoyéavec succés";
        } 
        else {
            echo "Echec de l'envoi de l'email";
        }

        echo json_encode($array);
    }

    function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>