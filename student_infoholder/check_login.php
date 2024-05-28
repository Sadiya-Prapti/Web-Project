<?php
session_start();
$id = $_POST['id'];
$pass = $_POST['pass'];
$bool = true;

$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "raiko";

print '<script>alert($id);</script>';
$connection = mysqli_connect($serverName, $userName, $password, $dbname);
if ($connection == false) {
    die("Error!!!" . mysqli_connect_error());
}

$query = mysqli_query($connection, "Select * from user_credential WHERE id='$id'");
$exists = mysqli_num_rows($query);
$table_id = "";
$table_pass = "";
if ($exists > 0) {

    $row = mysqli_fetch_assoc($query);
    $table_id = $row['id'];
    $table_pass = $row['pass'];
    if (($id == $table_id) && ($pass == $table_pass)) {

        $_SESSION['user'] = $id;
        if ($id == 'admin') {
            header("location: dashboardAdmin.html");
        } else
            header("location: dashboard.html");
    } else {
        print '<script>alert("Incorrect Password!");</script>';
        print '<script>window.location.assign("index.html");</script>';
    }
} else {
    print '<script>alert("Incorrect username!");</script>';
    print '<script>window.location.assign("index.html");</script>';
}
