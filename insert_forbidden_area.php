<?php
// connect to database
require("connection.php");

// HEADER
require_once("./header.php");
?>
    <br>
    <div class="container">

    <?php
    $coords=array();
    foreach ($_POST['coords'] as $coord)
    {
        array_push($coords,$coord);	
    }
    //print_r($coords);

    $sql = "INSERT INTO forbidden_area (name) VALUES('Forbidden Area')";

    if(mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);

        $count = 0;
        $xy = array();
        $sqlmulti = "";
        foreach($coords as $c)
        {
            if($count < 2){
                array_push($xy, $c);
                $count++;
            }
            else{
                $sqlmulti .= "INSERT INTO forbidden_coordinates (areaid, xcoord, ycoord) VALUES($last_id, $xy[0], $xy[1]);";
                $count = 0;
                $xy = array();
                array_push($xy, $c);
                $count++;
            }
        }
        // For very last coord record
        $sqlmulti .= "INSERT INTO forbidden_coordinates (areaid, xcoord, ycoord) VALUES($last_id, $xy[0], $xy[1]);";

        if (mysqli_multi_query($conn, $sqlmulti)) {
            echo "<h3 class='success'> Forbidden area coordinates have been inserted. </h3>";
        }
        else {
            echo "<h3 class='fail'> Forbidden area coordinates have not been inserted. </h3>";
            //echo "Error: " . $sqlmulti . "<br>" . mysqli_error($conn);
        }

        echo "<h3 class='success'> Forbidden area has been marked. </h3>";
    }
    else {
        echo "<h3 class='fail'> Forbidden area has not been marked. </h3>";
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    ?>
    </div>
<?php
// FOOTER
require_once("./footer.php");
?>