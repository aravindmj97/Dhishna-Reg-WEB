<?php
require "conn.php";
$mysql_qry = "SELECT MAX(regno) FROM partiinfo;";
$query = mysqli_query($conn, $mysql_qry);
if (!empty($query)) {
     while($r=mysqli_fetch_array($query))
              {
                $regno=$r[0];
              }
}
else{
  $regno = 0;
}
$regno++;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/form.css" />
<!--QR-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.js"></script>
<!--<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>-->
<!--<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     <script type="text/javascript">
        $(function () {
            $("#btnPrint").click(function () {
                var contents = $("#dvContents").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>DIV Contents</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                frameDoc.document.write('<link href="css/form.css"  rel="stylesheet" type="text/css" />');
                frameDoc.document.write('<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
    </script>
    <style type="text/css">
      @media print{
  body {
    width: 350px;
    height: 500px;
  }
  /* etc */
}
    </style>
<style type="text/css">
.bgimg {
    background-image: url('img/card.jpg');
}
</style>
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
            <li class="active"><a href="home.php">Registration</a></li>
            <li ><a href="update.php">Updation</a></li>
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
                 <h2 style="text-align:center; padding-top:50px"><b>Participent Registration Form</b></h2>
                   <div class="row">
                      <div class="col-sm-8 ">
              <div class="signup-form">
                <form action="insert.php" method="post" id="regform">
                  <h2>Enter the Details</h2>
                
                  <hr>
                  <div class="form-group">
                    <div class="row">
                                        
                                        <div class="col-xs-2"><label>RegNo<input type="text" class="form-control" id="regqr" name="regno" value="<?php echo $regno;?>" required="required"></label></div>
                      <div class="col-xs-5"><label>Name<input type="text" class="form-control" name="pname" id="cardname" required="required"></label></div>
                    <div class="col-xs-5">
                    <label>College<input type="text" class="form-control" name="pcollege" id="cardcollege" required="required"></label>
                       </div>
                    </div>          
                  </div>
                  <h3 align="center" style="color:black;"><b>Event List</b></h3>
                                    <hr />
                                    <div class="row" style="color:black;">

                                    <?php  
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
                                            <label class="checkbox" style="overflow-wrap:break-word;"><input type="checkbox" name="events[]" value=<?php $eventarr[0] ?>><?php echo $eventarr[1];?></label>
                                         <?php } ?>
                                            </div>
                                       </div> 
                                    </div>
                                    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                      
                  </div>
                </form>
                            </div>
                      </div>
                      <div class="col-sm-4">
                      
                             <div class="signup-form">
                <div  style="background: white; color: black; border-radius: 5px;">
                  <h2 align="center" style="padding-top: 10px;">Generated QRCode</h2> <br><hr style="margin-right: 0px;margin-left: 0px;"> <button onclick="conc(); makeCode()" class="btn btn-danger" style="margin-left: 20px;margin-right: 20px;">Generate</button><button id="btnPrint" style="margin-left: 20px" class="btn btn-danger">Print</button> 
                          <input id="text" type="text" value="." style="width:80%;margin-top: 10px;margin-left: 35px;" /><br />
                                                    
                                                    <div class="bgimg print" style="height: 500px;" id="dvContainer" >
                                                    <div><strong>
                                                      <p id="cardnamee" style="padding-top: 220px;padding-left: 100px;"></p>
                                                         </strong>
                                                    </div>
                                                    <div><strong>
                                                      <p id="cardcollegee" style="padding-top: 17px;padding-left: 100px;"></p>
                                                        </strong>
                                                    </div>
                                                        <div id="qrcode" style="width:100px; height:100px; margin-top:15px; padding-top: 55px;padding-left: 125px";"></div>
                                                    </div>
                                                    <script type="text/javascript">
                                                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                                                        width : 100,
                                                        height : 100
                                                    });
                                                    
                                                    function makeCode () {    
                                                        var elText = document.getElementById("text");
                                                        
                                                        if (!elText.value) {
                                                            alert("Input a text");
                                                            elText.focus();
                                                            return;
                                                        }
                                                        
                                                        qrcode.makeCode(elText.value);
                                                    }
                                                    
                                                    makeCode();
                                                    
                                                    $("#text").
                                                        on("input", function () {
                                                            makeCode();
                                                        }).
                                                        on("input", function (e) {
                                                            if (e.keyCode == 13) {
                                                                makeCode();
                                                            }
                                                        } );
                                                    </script>
                                       
                  <script src="js/qrget.js"></script>
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
<script type="text/javascript">
  function printlayer(Layer) {
    var generator=window.open(",'name,");
     var layertext = document.getElementById(layer);
     generator.document.write(layertext.innerHTML.replace("Print Me"));
     generator.document.close();
     generator.print();
     generator.close();
  }
</script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</html>