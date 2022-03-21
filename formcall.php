<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="js/qrcode.js"></script>
<script src="js/jquery.min.js"></script>
<style type="text/css">
								body{
									color: #fff;
									background: #3598dc;
									font-family: 'Roboto', sans-serif;
								}
								.form-control{
									height: 41px;
									background: #f2f2f2;
									box-shadow: none !important;
									border: none;
								}
								.form-control:focus{
									background: #e2e2e2;
								}
								.form-control, .btn{        
									border-radius: 3px;
								}
								.signup-form{
									width: 390px;
									margin: 30px auto;
								}
								.signup-form form{
									color: #999;
									border-radius: 3px;
									margin-bottom: 15px;
									background: #fff;
									box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
									padding: 30px;
								}
								.signup-form h2 {
									color: #333;
									font-weight: bold;
									margin-top: 0;
								}
								.signup-form hr {
									margin: 0 -30px 20px;
								}    
								.signup-form .form-group{
									margin-bottom: 20px;
								}
								.signup-form input[type="checkbox"]{
									margin-top: 3px;
								}
								.signup-form .row div:first-child{
									padding-right: 10px;
								}
								.signup-form .row div:last-child{
									padding-left: 10px;
								}
								.signup-form .btn{        
									font-size: 16px;
									font-weight: bold;
									background: #3598dc;
									border: none;
									min-width: 140px;
								}
								.signup-form .btn:hover, .signup-form .btn:focus{
									background: #2389cd !important;
									outline: none;
								}
								.signup-form a{
									color: #fff;
									text-decoration: underline;
								}
								.signup-form a:hover{
									text-decoration: none;
								}
								.signup-form form a{
									color: #3598dc;
									text-decoration: none;
								}	
								.signup-form form a:hover{
									text-decoration: underline;
								}
							</style>
<header>
		<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a href="" class="navbar-brand" style="color:white;"><b>DHISHNA REGISRATION</b></a>
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
								<form action="" method="post" id="regform" id="frm1">
									<h2>Enter the Details</h2>
								
									<hr>
									<div class="form-group">
										 First name: <input type="text" name="fname" value="Donald"><br>
  Last name: <input type="text" name="lname" value="Duck"><br><br>
  <input type="submit" value="Submit">
									</div>
								
								</form>
 
                            </div>
                      </div>
                      <div class="col-sm-4">
                             <div class="signup-form">
								
									<h2>Generated QRCode</h2> 
									<button onclick="myFunction()">Try it</button>

<p id="demo"></p>
<br />
                                                    <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>
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
                                                   <script>
function myFunction() {
    var x = document.getElementById("frm1");
    var text = "";
    var i;
    for (i = 0; i < x.length-1 ;i++) {
        text += x.elements[i].value ;
    }
    document.getElementById("demo").innerHTML = text;
}
</script>
							
									
						

                      </div>
                      </div>
                   </div>
				
				</div> 
			</div> 
</body>


<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</html>