<!DOCTYPE html>
<html>
<body>
<?php include 'menu.php';?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Category_Name FROM managecategory";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo '<button type="button" class="btn btn-success">'.$row["Category_Name"].'</button>';

    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
</body>
</html>
