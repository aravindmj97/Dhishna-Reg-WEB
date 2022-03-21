<?php
require "conn.php";
$regno = $_POST["regno"];
$pinfo = implode(',',$_POST["ptinfo"]);
$datecheck = implode('T',$_POST["date_checkin"]);
$datereg = implode('T',$_POST["date_reg"]);
$p_info = "1";
$eventlist =  implode(',', $_POST['events']);
$myArray = explode(',', $eventlist);
$pinfoArray = explode(',', $pinfo);
$datecheckArray = explode('T', $datecheck);
$dateregArray = explode('T', $datereg);
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
      	$qrydel = "DELETE FROM reginfo WHERE regno = $regno;";
      	$qrydelexe = mysqli_query($conn, $qrydel);
 for ($i=0; $i <sizeof($myArray); $i++) { 
	//echo $myArray[$i];
	if(!empty($datecheckArray[$i])){
        //echo $regno;
        //echo $pinfoArray[$i];
        //echo $datecheckArray[$i];
        //echo $dateregArray[$i];
      	//echo $myArray[$i];
      	$qryInsert = "INSERT INTO reginfo (regno, eid, pinfo, date_time_checkin, date_time_reg) VALUES ($regno, $myArray[$i], $pinfoArray[$i], '$datecheckArray[$i]', '$dateregArray[$i]');";
      	$qryInsertexe = mysqli_query($conn, $qryInsert);
    }
    elseif (!empty($dateregArray[$i])) {
      $qryInsert = "INSERT INTO reginfo (regno, eid, pinfo, date_time_reg) VALUES ($regno, $myArray[$i], $pinfoArray[$i], '$dateregArray[$i]');";
        $qryInsertexe = mysqli_query($conn, $qryInsert);
    }
      else{
      	$reg_qry = "INSERT INTO reginfo (regno, eid, pinfo, date_time_reg) VALUES ($regno, $myArray[$i], '$p_info', '$today');";
      mysqli_query($conn, $reg_qry);
      }
}
echo "<script language='javascript' type='text/javascript'> location.href='update.php' </script>";	
?>