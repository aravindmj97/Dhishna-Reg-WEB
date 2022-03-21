<?php
require "conn.php";
$reg = $_GET['regno'];
                                       $qury = "SELECT eid FROM reginfo WHERE regno = $reg;";
                                       $res = mysqli_query($conn, $qury);
                                       $s = mysqli_fetch_array($res);
                                       $rowcount=mysqli_num_rows($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/form.css" />
<!--QR-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<header>
    <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand" style="color:white;"><b>DHISHNA REGISTRATION</b></a>
                    <a href="" class="navbar-brand" style="">Welcome <?php session_start();
                                  $login_session=$_SESSION['login_user'];
                                  echo $login_session;?></a>
        </div>
          <div class="collapase navbar-collapse">
          <ul class="nav navbar-nav navbar-center">
            <li ><a href="home.php">Registration</a></li>
            <li class="active"><a href="update.php">Updation</a></li>
          </ul>
                       <a href="logout.php" class="btn btn-primary navbar-btn navbar-right">Logout</a>
            </div>
      </div>
    </div>
 </header>
 </head>
<body>
  <div class="">
        <div class="container">
                 <h2 style="text-align:center; padding-top:50px"><b>Participant Updation Form</b></h2>
                   <div class="row">
                      <div class="col-sm-8 ">
                                          <div class="row ">
                                        <form method="GET" action="#getcheck">
                                        <div class="col-xs-2"><label>RegNo<input type="text" class="form-control" id="regqr" name="regno" value="<?php echo $reg; ?>" required="required"></label></div>
                                        <button class="btn btn-danger" style="margin-top: 25px"><b>Get Details</b></button></form>
                    </div>   
              <div class="signup-form">
                <form action="insertupdate.php" method="post" id="getcheck">
                  <h2>Enter the Regno</h2>
                 
                  <hr>
                  <div class="form-group">
       
                  </div>
                  <h3 align="center" style="color:black;"><b>Event List</b></h3>
                                    <hr />
                                     <div class="row" style="color:black;">

                                    <?php  
                                      $qrylist = "SELECT * FROM reginfo WHERE regno = $reg;";
                                      $qryevent = "SELECT * FROM events ;";
                                      $eventexe = mysqli_query($conn, $qryevent);
                                      
                                      $prebr = "CS"; ?>
                                      <div class="col-sm-2 well">
                                            <div class="form-group">
                                              <h4><?php echo $prebr;?></h4><br /><hr /><?php
                                      while($eventarr=mysqli_fetch_array($eventexe))
                                          {  
                                            if ($prebr != $eventarr[2]) {
                                               $prebr = $eventarr[2]; ?>
                                                    </div>
                                               </div> 

                                                <div class="col-sm-2 well">
                                            <div class="form-group">
                                              <h4><?php echo $prebr;?></h4><br /><hr /><?php
                                            } ?>
                                            <label class="checkbox" style="overflow-wrap:break-word;"><input type="checkbox" name="events[]" value=<?php echo "$eventarr[0]"; ?> <?php
                                            $listexe = mysqli_query($conn, $qrylist);
                                                 while($listarr = mysqli_fetch_array($listexe))
                                                  { if ($listarr[2] == $eventarr[0]) {echo "checked='checked'";?>>
                                            <input type="hidden" name="ptinfo[]" value="<?php echo "$listarr[3]"; ?>">
                                            <input type="hidden" name="date_checkin[]" value="<?php echo "$listarr[4]"; ?>">
                                            <input type="hidden" name="date_reg[]" value="<?php echo "$listarr[5]"; ?>">
                                             <?php  } } ?>><?php echo $eventarr[1];?></label>
                              
                                         <?php } ?>
                                            </div>
                                       </div> 
                                    </div>
                    <input type="hidden" name="regno" value="<?php echo $reg; ?>">                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                      
                  </div>
                </form>
                            </div>
                      </div>
                      <div class="col-sm-4">
                      
                             <div class="signup-form">
                <div  style="background: white; color: black; border-radius: 5px;">
                  <h3 align="center" style="padding-top: 10px;">Currently Participating Events</h3> <br><hr style="margin-right: 0px;margin-left: 0px;"> <button onclick="getinfo()" class="btn btn-danger" style="margin-left: 20px;margin-right: 20px;">Get Details</button>
                 
                  <div class="well">
        <table class="table table-hover">
           <tr>
              <td><b>Event ID</b></td>
              <td><b>Event Name</b></td>
              <td><b>Participated?</b></td>
            </tr>
           
            <tr class="info">
              <td></td>
              <td></td>
              <td></td>
            </tr>
        

        </table>
      </div>
                </div>

                      </div>
                      </div>
                   </div>
        
        </div> 
      </div> 
   <footer>
    <div class="container" style="background-color:white;">
      <hr>

      <p>
        <small><a href="http://facebook.com/askorama">Like me</a> On facebook</small></p>
      <p> <small><a href="http://twitter.com/wiredwiki">Ask whatever </a> On Twitter</small></p>
      <p> <small><a href="http://youtube.com/wiredwiki">Subscribe me</a> On Youtube</small>
        
      </p>
    </div> <!-- end container -->
  </footer>
</body>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</html>