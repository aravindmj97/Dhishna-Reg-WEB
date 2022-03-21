<?php
require "conn.php";
$regno = $_POST["regno"];
$ptname = $_POST["pname"];
$ptcoll = $_POST["pcollege"];
$p_info = "1";
$eventlist =  implode(',', $_POST['events']);
$myArray = explode(',', $eventlist);
 $participent_qry = "UPDATE partiinfo SET pname = '$ptname', pcollege = '$ptcoll' WHERE regno = $regno";
 mysqli_query($conn, $participent_qry);
 $date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
 for ($i=0; $i <sizeof($myArray); $i++) { 
	//echo $myArray[$i];
     $reg_qry = "INSERT INTO reginfo (regno, eid, pinfo, date_time_reg) VALUES ($regno, $myArray[$i], '$p_info', '$today');";
      mysqli_query($conn, $reg_qry);
}
echo "<script language='javascript' type='text/javascript'> location.href='home.php' </script>";	
?>