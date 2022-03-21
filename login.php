<?php
require "conn.php";
$user_name = $_POST["username"];
$pass = $_POST["password"];
$mysql_qry = "SELECT * FROM login WHERE uname = '$user_name' AND passwd = '$pass';";
$result = mysqli_query($conn, $mysql_qry);
if(mysqli_num_rows($result)>0) {
echo "login success";
}
else
{
echo "login Not success";
}
?>