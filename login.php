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