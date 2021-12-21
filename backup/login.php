<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="design.css" rel="stylesheet">
</head>
<body>
    <div id="main">
      <h1>Anmelden</h1>
      <form method="POST">
	<input type="text" name="username" class="text" autocomplete="off"
	required placeholder="Benutzername"><br>
	<input class="text" type="password" name="password" required placeholder="Passwort">
	</br>
	<br>
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
      $un=$_POST['username'];
      $pw=$_POST['password'];
      $sql=mysql_query("select password from user where username='$un'");
      if ($row=mysql_fetch_array($sql)) {
	   if ($pw==$row['password']) {
	      header("location:Home.html");
	      exit();
	  }
	  else
	      echo "<script>alert('ungültiges Passwort')</script>";
	  }
	  else
	      echo "<script>alert('ungültiger Benutzername')</script>";
      }
      
     
?>