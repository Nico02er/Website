<!DOCTYPE html>
<html>
<head>
  <title>Registrieren</title>
  <link href="design.css" rel="stylesheet">
</head>
<body>
    <div id="main">
      <h1>Registrieren</h1>
      <form method="POST">
	<input type="text" name="firstname" autocomplete="off" placeholder="Vorname">
	<br>
	<input type="text" name="lastname" autocomplete="off" placeholder="Nachname">
	<br>
	<input type="text" name="username" class="text" autocomplete="off"
	placeholder="Benutzername"><br>
	<input class="text" type="password" name="password" placeholder="Passwort">
	</br>
	<input class="text" type="password" name="confirm_password" placeholder="Bestätige Passwort">
	<br>
	</br>
	<input type="Submit" name="submit" id="sub">
	</br>
      </form>
    </div>
</body>
</html>

<?php
    mysql_connect("localhost","root","123");
    mysql_selectdb("simplelogin");
    
    if (isset($_POST['submit'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      
      if($_POST['password'] != $_POST['confirm_password'])
      {
	echo "<script>alert('Die Passwörter stimmen nicht überein')</script>";
	header("location:Home.html");
	exit();
      }
     $sql=mysql_query("select username from user where username='$username'");
     if ($row=mysql_fetch_array($sql)) {
      if ($username==$row['username']) {
	echo "<script>alert('Der Benutzername existiert bereits')</script>";
	header("location:Home.html");
	exit();
     }
    }
    mysql_query("Insert INTO user (username, password, first_name, last_name) VALUES('$username','$password','$firstname','$lastname');");
   
    }
?>
