<!doctype html>
<html>
<head>
	<title>attempt 1</title>
</head>
<body>
<form method="post">
<input type="text" placeholder="username" name="uname"><br>
<input type="password" placeholder="password" name="pass"><br>
<input type="submit" name="submit" value="Sign up!" class="sign-up-button">
</form>
</body>
<?php 
if(isset($_POST["submit"]))
{
$conn = mysql_connect("localhost","root","");
$creat = "CREATE DATABASE attempt1";
if(mysql_query($creat)){
	//echo "db created";
}
else{
	//echo "db error";
}
mysql_select_db('attempt1', $conn);
$tab="CREATE TABLE users_tb(id INT(20) NOT NULL AUTO_INCREMENT,username VARCHAR(20), password VARCHAR(100), PRIMARY KEY(id))";
if(mysql_query($tab)){
	//echo "table created";
}
else{
	//echo "table error";
}
$u_name = $_POST['uname'];
$pass = $_POST['pass'];
$pass = md5($pass);
if(isset($u_name)){
$mysql_get_users = mysql_query("SELECT * FROM users_tb where username='$u_name'");

$get_rows = mysql_affected_rows($conn);

if($get_rows >=1){
echo "user exists";
die();
}

else{
//echo "user do not exists";
}
}

$ins = "INSERT INTO users_tb(username, password) values
	('$u_name','$pass')";
if(mysql_query($ins)){
	echo "CREATED!";
}
else{
	echo "FAILED!";
}
}
?>
</html>
