<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<form  method="post">
	<h3>User Name</h3>
		<input type="text" name="username"><br>
	<h3>Password</h3>
	<input type="password" name="password">
	<button type="submit" name="submit" class="btn btn-primary">Login</button>
	</form>
    <?php
if (isset($_POST['submit']))
	{	  
include("conn.php");

session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$_SESSION['login_user']=$username;
 
$mysql_query = "SELECT eid FROM login WHERE uname='$username' and passwd='$password';";
$query = mysqli_query($conn, $mysql_query);

 if (mysqli_num_rows($query) != 0)
{

 echo "<script language='javascript' type='text/javascript'> location.href='home.php' </script>";	
  }

  else
  {
echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
}

}
    
?>
</body>
<script src="js/bootstrap.js"></script>
<script src="js/jquery-3.2.1.js"></script>
</html>