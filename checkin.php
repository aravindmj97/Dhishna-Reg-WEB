<?php
require "conn.php";
$reg_no = $_POST["parti_id"];
$e_id = $_POST["org_id"];
$mysql_query = "SELECT pinfo FROM reginfo WHERE regno = '$reg_no' AND eid = '$e_id';";
$result = mysqli_query($conn, $mysql_query);
$pinfo = mysqli_fetch_array($result);
$p = "0";
if(mysqli_num_rows($result)>0) {
	if ($pinfo=="1") {
		$mysql_query1 = "UPDATE reginfo SET pinfo = '$p' WHERE regno = '$reg_no';";
		mysqli_query($conn, $mysql_query1);
	}
 echo $pinfo[0];
}
else{
	echo "Participant has NOT Registered for the Event!!!";
}
?>