<?php 

    $array = array("email" => "","prenom" => "","nom" => "","message" => "","emailError" => "","prenomError" => "","nomError" => "","messageError" => "","isSucces" => false);

    $emailTo = "cassandra.sciauvaud@hotmail.fr";

    if ($_SERVER["REQUEST_METHOD"] == POST)
    {
        $array["email"] = verifyInput($_POST["email"]);
        $array["prenom"] = verifyInput($_POST["prenom"]);
        $array["nom"] = verifyInput($_POST["nom"]);
        $array["message"] = verifyInput($_POST["message"]);
        $array["isSuccess"] = true;
        $emailText = "";

        if(empty($array["email"]))
        {
            $array["emailError"] = "Oups, il y a un problème avec votre e-mail";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText = "Email: {$array["email"]}\n";  
        }

        if(empty($array["prenom"]))
        {
            $array["prenomError"] = "Je veux connaître votre prénom";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText = "Prénom: {$array["prenom"]}\n";  
        }

        if(empty($array["nom"]))
        {
            $array["nomError"] = "Et oui, je veux même savoir votre nom";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText = "Nom: {$array["nom"]}\n";  
        }

        if(empty($array["message"]))
        {
            $array["messageError"] = "Que voulez vous me dire ?";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText = "Message: {$array["message"]}\n";  
        }
        if($array["isSucces"])
        {
            $headers = "From: {$array["prenom"]} {$array["nom"]} <{$array["email"]}>\r\nReply-To: {$array["email"]}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
        }

        echo json_encode($array);
    }

    function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone) {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>