<?php
if (!isset($_POST["sub"])) {
  exit;
}
  
  $name = addslashes(htmlspecialchars($_POST["name"]));
  $email = addslashes(htmlspecialchars($_POST["email"]));
  $tel = addslashes(htmlspecialchars($_POST["tel"]));
  $msg = addslashes(htmlspecialchars($_POST["nachricht"]));
  
  if(($name == "") OR ($email == "") OR ($msg == "")) {
    echo "Bitte füllen Sie alle Pflichtfelder aus!";
    exit;
  }
  
  $numbers = array("0","1","2","3","4","5","6","7","8","9");
  
  foreach ($numbbers as $key => $value) {
    if(strpos($tel, $value) === FALSE) {
    
    } else {
      echo "In der Telefonnummer darf kein Buchstabe vorkommen!";
      exit;
    }
  }
  
  if(strpos($email, "@") == FALSE) {
    echo "Geben Sie eine gültige Emailadresse ein!";
    exit;
  }
  $emailSplit  = explode("@", $email);
  if(strpos($emailSplit[1], ".") == FALSE) {
    echo "Geben Sie eine gültige Emailadresse ein!";
    exit;
  }
  $emailSplitSecond = explode(".", $emailSplit[1]);
  if($emailSplitSecond[0] == "trashmail") {
    echo "Offenlliche Emailadressen werden nicht akzeptiert";
    exit;
  }
  
 
  $Betreff = "Neue Kontaktanfrage";
  $email_mein = "nico.Jaermann@ipi.ch";
  $header = "From: $email";
  
  if (!empty($mail_cc)) {
    $header .=  "\n";
    $header  .= "Cc: $mail_cc";
  }
  
  $header .= "\nContent-type: text/plain; charset=utf-8";
  
  $mail_senden = mail($email_mein,$Betreff,$msg,$header);
  
  ?>
    