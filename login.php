<?php 
require_once('connection.php');
session_start();
$_SESSION['login'] = false;
if (isset($_GET['username'])) {
  $sql = "DELETE FROM user WHERE username = '". $_GET['username']."'";
  $result = $conn->query($sql);
}
if(isset($_POST['submit'])){
	$sql = "SELECT * FROM user WHERE BINARY username = BINARY '". $_POST['username']. "'";
	$result = $conn->query($sql);
	$data = array();
	if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifying the password against the stored hash 
    if (password_verify($_POST['password'], $row['password'])) {
        //echo 'Password is valid!';
        if ($_POST['remember']) {
          $hour = time() + 3600;
          setcookie("remember_me", $_POST['username'], $hour);
        }
        elseif (!$_POST['remember']) {
          if(isset($_COOKIE['remember_me'])) {
            $past = time() - 100;
            setcookie("remember_me","",$past);
          }
        }
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['login'] = true;
        header('location:index.php');
    } else {
        $msg = "Invalid password";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
	} else {
		$msg = "Invalid username";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
}

// HEADER
require_once("./header.php");
?>

    <script>
      $(document).ready(function(){
        //$('#form').hide().delay(500).fadeIn();
      });
    </script>

<!--<body oncontextmenu="return false">-->

  <form method="post" id="form">

    <div class="form-group col-md-10">
      <label style="color: black">Username:</label>
      <input autofocus type="text" name="username" class="form-control input-sm" placeholder="Enter username" id="email" value="<?php if(isset($_COOKIE['remember_me'])){echo $_COOKIE['remember_me'];} else {echo "";}  ?>" required>
    </div>
    <div class="form-group col-md-10">
      <label for="pwd" style="color: black">Password:</label>
      <input type="password" name="password" class="form-control input-sm" placeholder="Enter password" id="pwd">
      <br>
      <button type="submit" name="submit" class="col-md-4 btn btn-success btn-sm"><b>Login</b></button>
    </div>
    <div class="checkbox col-md-10">
      <label> <input type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_me'])) {echo 'checked="checked"';}
      else {echo "";} ?> > <span style="color: gold"> Remember me</span></label>
    </div>
    <div class="col-md-8" style="margin-left: 120px">
      <br><br><br><br>
      <label><span style="color: lightblue"> New here?</span></label>
      <button class="btn btn-info" onclick="location.href='signup.php';">Sign Up</button>
    </div>

  </form>

<?php
// FOOTER
require_once("./footer.php");
?>