<!DOCTYPE html>
<?php
	//novi user --> newUsername, newPassword, date, signup
	//login --> username, password, loginSubmit
	
	$user = isset($_POST['newUsername']) ? $_POST['newUsername'] : null;
	$pass = isset($_POST['newPassword']) ? md5($_POST['newPassword']) : null;
	$ulogirani=false;
	
	$username = isset($_POST['newUsername']) ? $_POST['newUsername'] : null;
	$password = isset($_POST['newPassword']) ? $_POST['newPassword'] : null;
	$date = isset($_POST['date']) ? $_POST['date'] : null;
	
	$control=false;
	$unesenKorisnik=false;
	$postojeciKorisnik=false;
	$prekratkiPassword=false;
	$nemaUnosa=false;
	
	$link = mysqli_connect("localhost", "root", "");																				//SPAJANJE NA SERVER
		if(!$link) {
			die("Cannot connect to MySQL Server" .
			mysql_error() );
		}
	$db_selected = mysqli_select_db($link, "rwaprojekt");																		//SPAJANJE NA BAZU
		if (!$db_selected){
			die("Cannot select that database. " .
				mysql_error() );
		}
	
	if (isset($_POST['loginSubmit'])){
		$login = "SELECT * FROM users WHERE username='" . $user . "' AND password='" . $pass . "'";
		$resultLogin = mysqli_query($link , $login);
		if(!$resultLogin) {
			die("An error ocurred while trying to process your request. " .
				mysql_error());
		} else {
			$control=true;				//pobijam glavnu varijablu, za sada mi je to ok cisto da provjerim ispravnost, kasnije maknuti
			$ulogirani=true;			//isto tako, dummy varijabla za provjeru i dizanje flagova
										//tu ce ic glavna redirekcija na novu stranicu di ce bit igrica i to (dvije, admin i user stranice treba napravit)
		}
	}
		
	
	if (isset($_POST['signup'])){																									//UNOS NOVOG KORISNIKA
				
		$upit = "SELECT * FROM users WHERE username='" . $username . "'";
		$result1 = mysqli_query($link , $upit);
		if(!$result1) {
			die("An error ocurred while trying to process your request. " .
				mysql_error());
		}
		while ($row = mysqli_fetch_array($result1, MYSQL_BOTH)) {																//PROVJERA ZA USERNAME
			if ($row['username']==$username){
				$control=true;
				$postojeciKorisnik=true;
				$nemaUnosa=true;
				break;
			}
		}
		if (strlen($password)<=6) {																							//PROVJERA DUZINE PASSWORDA
			$control=true;
			$prekratkiPassword=true;
			$nemaUnosa=true;
		} else {
			$password = md5($password);
		}
		
		if (!$nemaUnosa) {		
			$insertNewUser = "INSERT INTO users (username, password, admin) VALUES('".$username."','".$password."','0')";
			$result2 = mysqli_query($link , $insertNewUser);
			if(!$result2) {
				die("An error ocurred while querying." .
					mysql_error());
			} else {
				$control=true;
				$unesenKorisnik=true;
			}
		}
	}	
	
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SimTeh</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
		body {
			background-image:url("12.jpg");
			background-repeat:no-repeat;
			background-size: 1370px 800px;
		}
	
	</style>
	
<?php 
function show_page(){
?>	
  </head>
  <body>
  
	<!-- pocetak header-a (menua)-->
    <div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a href="" class="navbar-brand">SimTeh Logo</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="">Home</a></li>
					<li><a href="">Nesto</a></li>
					<li><a href="">Nesto drugo</a></li>
					<li><a href="">Nesto trece</a></li>
					<li><a href="">Rang lista</a></li>
					<li><a href="">O nama</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--kraj headera(menua)-->
	
	<div class="container" id="slika">
		<form class="form-inline" role="form" method="post" action="">
			<div class="form-group">
				<div class="input-group">
					<label class="sr-only" for="username">Enter Username</label>
						<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<label class="sr-only" for="password">Enter password</label>
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				</div>
			</div>	
		  <button type="submit" class="btn btn-default" name="loginSubmit">Log in</button>
		  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#signInModal">Sign up!</button>
						
		</form>
		
	</div>
	
	<div class="container">
		<div class="modal" id="signInModal">
			<div class="modal-dialog ">
				<form class="form-horizontal" role="form" method="post" action="bsPocetna.php">  <!--form ide okolo (wrap) modal contenta tako da uhvati i submit button-->
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">x</button>
						<h4 class="modal-title">Register Form</h4>
					</div>
					
					<!--pocetak forme za registraciju novog korisnika -->
					<div class="modal-body">
						
							<div class="form group">
								<label class="sr-only" for="username">.</label>
								<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
								<input type="text" class="form-control" id="newUsername" name="newUsername" placeholder="Choose your username" />
							</div>
							
							<div class="form group">
								<label class="sr-only" for="newPassword">.</label>
								<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
								<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Type your password" />
							</div>
							
							<div class="form group">
								<label class="sr-only" for="date">.</label>
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> Date of birth</div>
								<input type="date" class="form-control" id="date" name="date" />
							</div>			
						
					</div>
					<!--kraj forme za registraciju novog korisnika -->
							
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success" name="signup" value="Sign up">Sign up!</button>
					</div>
					
				</div>
				</form>
			</div>
			
		</div>
	</div>
	<!--kraj modal (popup) za signin --->
	
<?php }
	if(!$control) {
		show_page();
	} else if ($postojeciKorisnik) {
		print('<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Username already exists.
		   </div>');
	} else if ($prekratkiPassword) {
		print('<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Password too short, must be at least 7 characters long.
		   </div>');

	} else if($ulogirani){
		print('<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Great, you just logged in!
		   </div>');
	}else {   
		print('<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert">x</button>
			User successfully registered.
		   </div>');
}
?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
