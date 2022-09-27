<?php

$array = array("email" => "", "message" => "", "emailError" => "", "messageError" =>"", "isSucces" => false);


$emailTo = "cassandra.sciauvaud@hotmail.fr";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $array ["email"] = verifyInput ($_POST['email']);
  $array ["message"] = verifyInput ($_POST['message']);
  $array ["isSucces"] = true;
  $emailText = "";

  if (empty($array ["email"]))
  {
    $array ["emailError"] = "Je veux connaître votre e-mail :)";
    $array ["isSucces"] = false;
  }
  else
  {
    $emailText .= "email:{$array ["email"]}\n";

  }  

  if (empty($array ["message"]))
  {
    $array ["messageError"] = "Oups ! Il y a un problème dans votre message";
    $array ["isSucces"] = false;
  }
  else
  {
    $array ["message"] .= "message: {$array ["message"]}\n";
  }

  if ($array ["isSucces"])
  {
    $headers = "From: <{$array ["email"]}>\r\nReply-To: {$array ["email"]}"; 
    mail($emailTo, "Un message de ton portfolio",$emailText, $headers); 
   
  }

  echo json_encode ($array);

}

//vérification données formulaire

function verifyInput($var)
{
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $var;
}

?>