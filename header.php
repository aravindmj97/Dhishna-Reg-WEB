<header>
		<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a href="" class="navbar-brand" style="color:white;"><b>DHISHNA REGISRATION</b></a>
                    <a href="" class="navbar-brand" style="">Welcome <?php 
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
			<div class="jumbotron">
				<div class="container">
					<h1>Hello World</h1>
					<h3>Navbar in Bootstrap</h3>
				</div> 
			</div> 
	</header>