<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="author" content="Mussab Tanveer Siddiqui">
    <meta name="description" content="Tree Plantation">
    <meta name="keywords" content="tree, trees, plant, plants, plantation, green, environment" />
    <title>Tree Plantation</title>
    <script src="./script/jquery/jquery-3.2.1.min.js"></script>
    <script src="./script/custom-javascript.js"></script>
    <script src="./bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="./images/pine-tree.png" />
    <link rel="stylesheet" href="./bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Footer-with-button-logo.css">
    <link rel="stylesheet" href="./css/Login.css">
    <link rel="stylesheet" href="./css/BackButton.css">
</head>
<body onload="<?php if (isset($_SESSION['id'])) {
                    $sql = "SELECT userid FROM admin_role WHERE userid='".$_SESSION['id']."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) echo "showAdmin()";
                    else echo "hideAdmin()";
                }
                ?>">
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="./index.php">TreePlantation</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="./index.php">Plant Tree</a></li>
            <li><a href="./forbidden_area.php">Forbidden Area</a></li>
            <li style="visibility: hidden;" id="admin" 
                
            ><a href="./admin.php">admin</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="./signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <?php
            if(isset($_SESSION['login']) && $_SESSION['login'] == true){
            ?>
            <li><a onclick="logout()" style="cursor: pointer;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <li><a onclick="deleteAccount('<?php echo $_SESSION['username']; ?>')" style="cursor: pointer;"><span class="glyphicon glyphicon-trash"></span> Delete account</a></li>
            <?php
            }
            else {
            ?>
            <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php
            }
            ?>
        </ul>
        </div>
    </div>
    </nav>