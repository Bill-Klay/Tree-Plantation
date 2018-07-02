<?php
// connect to database
require("connection.php");
// HEADER
require_once("./header.php");
?>
    <br>
    <div class="container">

    <?php
    if(!empty($_GET['area'])) {
        $area = $_GET['area'];

        // Delete area query
        $sql = "DELETE FROM forbidden_area WHERE id = $area";

        if(mysqli_query($conn, $sql)) {
            // Delete area coordinates query
            $sql = "DELETE FROM forbidden_coordinates WHERE areaid = $area";

            if (mysqli_query($conn, $sql)) {
                echo "<h3 class='success'> Forbidden area coordinates have been deleted. </h3>";
            }
            else {
                echo "<h3 class='fail'> Forbidden area coordinates have not been deleted. </h3>";
                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            echo "<h3 class='success'> Forbidden area has been deleted. </h3>";
        }
        else {
            echo "<h3 class='fail'> Forbidden area has not been deleted. </h3>";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
    </div>
<?php
// FOOTER
require_once("./footer.php");
?>