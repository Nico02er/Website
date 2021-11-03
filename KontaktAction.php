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
  
  
  $nachricht = "Wir haben Ihre Anfrage dankend erhalten";
  mail($email, "Bestätigung der Kontaktaufnahme", $Nachricht);
  
  $message = "Das Kontaktformular wurde am ".date("d.m.Y")." um ".date("H:i:s")." von ".$name." (Email: ".$email;
  
  if($tel != "") {
    $message .= ", Tel: ".$tel;
  }
  $message .= ") verwendet. Nachricht: '".$msg."'";
  
  mail("nico.jaermann@ipi.ch", "Nutzung des Kontaktformulars", $message);
  
  echo "Wir haben Ihre Anfrage dankend erhalten";
  
  ?>
    