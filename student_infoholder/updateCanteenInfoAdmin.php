
<?php

session_start();
$user = $_SESSION['ssid'];



$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "raiko";
$connection = mysqli_connect($serverName, $userName, $password, $dbname);
if ($connection == false) {
    die("Error!!!" . mysqli_connect_error());
}


$query = mysqli_query($connection, "SELECT * from canteen WHERE id='$user'");
$row = mysqli_fetch_assoc($query);



$add = $_POST['addcost'];
$adddue = $_POST['adddue'];
$erase = $_POST['erasedue'];

$x = 0;
$y = 0;


if (($row['cost'])!=NULL) {
    $x = $row['cost'];
    
}
if (($row['due'])!=NULL) {
    $y = $row['due'];
}

if ($add != NULL) {
    $x = $x + $add;
}

if ($adddue != NULL) {
    $y = $y + $adddue;
}
if ($erase != NULL) {
    $y = $y - $erase;
}

if ($y < 0) {
    $y = 0;
}




mysqli_query($connection, "UPDATE `canteen` SET `due`='$y',`cost`='$x' WHERE id='$user'");


print '<script>alert("Successfully Updated!");</script>';      // Prompts the user
print '<script>window.location.assign("canteen_updateAdmin.html");</script>'; // redirects to 


?>