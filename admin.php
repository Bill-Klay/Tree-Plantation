<!DOCTYPE html>

<?php 
require("connection.php");
require_once('session.php');
require_once("./header.php");

$sql = "SELECT * FROM trees.user ORDER BY ID ASC";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$data[] = $row; 
    }
} else {
    echo "0 results";
}
?>

<html>
	<head>
		<title>Table</title>
		<script src="./script/jquery/jquery-3.2.1.min.js"></script>
    	<script src="./script/custom-javascript.js"></script>
		<link rel="stylesheet" href="./bootstrap-3.3.7/css/bootstrap.min.css">
		<script src="./bootstrap-3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>	
	<div class="container">
		<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
		?>
		<div class="row"><!-- 
			<div>
		<h2 class="text-center"><button type="button" class="btn btn-warning col-md-2" onclick="deleteAccount('<?php echo $_SESSION['username']; ?>')">Delete Account</button><a href="login.php">Logout</a> -  <?php echo $_SESSION['username']?></h2>
	 	</div> -->
	 	<div class="col-md-4"></div>
	 	<div class="col-md-5"></div>
	 	<!-- <div class="col-md-3">
	 		<form method="post">
				<input id="search" name="search" type="text" placeholder="Type here">
				<input id="submit" type="submit" value="Search">
			</form>
	 	</div> -->
		</div>
		<?php }
		else { header('location:login.php');
		}
		?>
		<h3>List Of Users - <a href="addEmp.php">Add</a></h3>         
		<table class="table table-condensed">
			<thead>
			  <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<?php 
			for($i=0; $i<count($data); $i++){
			?>
			  <tr>
				<td><?php echo $data[$i]['id']?></td>
				<td><?php echo $data[$i]['username']?></td>
				<td><?php echo $data[$i]['email']?></td>
				<td><a class="text-primary" href="addEmp.php?id=<?php echo $data[$i]['id']?>">Update</a></td>
				<td><a class="text-danger" href="deletEmp.php?id=<?php echo $data[$i]['id'];?>">Delete</a></td>
			  </tr>
			<?php }?>
			</tbody>
		 </table>
		</div>
	</body>
</html>

<?php
require_once("./footer.php");
?>