<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Registration</h1>
<div id="userAccount">
<h2>Registration Form</h2>
<form action="" method="post">

<input id="name" name="name" placeholder="name" type="text">

<input id="phone" name="phone" placeholder="phone" type="text">

<input id="address" name="address" placeholder="address" type="text">

<input id="email" name="email" placeholder="email" type="text">

<input id="name" name="username" placeholder="username" type="text">

<input id="password" name="password" placeholder="**********" type="password"><br><br>
<input name="submit" type="submit" value=" Login ">




</form>
</div>
</div>
</body>
</html>
