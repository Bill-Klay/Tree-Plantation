<?php
// HEADER
require_once("./header.php");
?>
		<style>
			.margin {margin-top: 15%;}
		</style>

		<script>
			$(document).ready(function(){
  				/*$('#signup').hide();
  				$('#buttonboxback').hide();
  				appear();*/
  			});
		</script>

<!--	<body style="overflow-x: hidden;">-->
		<div class="row">
			<div class="col-md-2">
				<br>
				<div id="buttonboxback" class="col-md-2"><a href="login.php">Maybe later</a></div>
			</div>
			<div class="col-md-4">
				<br>
				<form method="post" class="margin" id="signup">

				  <div class="form-group col-md-9">
			      <label style="color: black">Email:</label>
			      <input autofocus type="email" name="email" class="form-control input-sm" placeholder="your email" id="email" required>
			    </div>
			    <div class="form-group col-md-9">
			      <label style="color: black">Username:</label>
			      <input type="text" name="Name" class="form-control input-sm" placeholder="enter username" id="email" required>
			    </div>
			    <div class="form-group col-md-9">
			      <label>Enter new password:</label>
			      <input type="password" name="password" class="form-control input-sm" placeholder="enter password" required>
			    </div>
			    <div class="form-group col-md-9">
			      <label>Re-enter password:</label>
			      <input type="password" name="pswdAgain" class="form-control input-sm" placeholder="re-enter password" required>
			    </div>
			    <button type="submit" name="submit" class="col-md-4 btn btn-info btn-sm" style="margin-left: 15px"><b>Signup</b></button>
				
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>

	<script>
		function appear(){
			$('#signup').delay(500).fadeIn();
			$('#buttonboxback').delay(500).fadeIn()
		};
	</script>


<?php
require_once('connection.php');
if(isset($_POST['submit']) && !isset($_GET['id'])){
	
	$user = $_POST;
	if ($user['password'] === $user['pswdAgain']) {
	// Creating a hash
	$hash = password_hash($user['password'], PASSWORD_DEFAULT, ['cost' => 12]);
	$sql = "INSERT INTO user (username, email, password) VALUES ('".$user['Name']."','".$user['email']."','".$hash."')";
	$message = '';
	if ($conn->query($sql) === TRUE) {
		header('location:login.php');
	}else{
		$text = $sql." (".$conn->error.")";
		$message = '<br><br><br> <div class="alert alert-danger" role="alert" style="height: -10px">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					'."Username already exists".'
				</div>';
			echo $message;
	}

	}
	else {
		$msg = "Password mismatch, please re-enter";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
}

// FOOTER
require_once("./footer.php");
?>
