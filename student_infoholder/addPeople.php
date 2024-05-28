<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if ($_SESSION['user']) {
    } else {
        header("location: index.html");
    }


    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "raiko";
    $connection = mysqli_connect($serverName, $userName, $password, $dbname);
    if ($connection == false) {
        die("Error!!!" . mysqli_connect_error());
    }

    $id = $_POST['id'];
    $room = $_POST['room'];
    $due = $_POST['due'];
    $admit = $_POST['day'];
    $next = $_POST['nextday'];
    $dept = $_POST['dept'];






    $my_query = "INSERT INTO `hostel`(`id`, `room`, `due`, `admit`, `day`) VALUES ('$id','$room','$due','$admit','$next')";
    $personal = "INSERT INTO `personal_info`(`id`, `first_name`, `last_name`, `section`, `department`, `credit`, `phone`, `email`, `local_address`, `permanent_address`, `gender`, `religion`, `blood`) VALUES ('$id','','','','$dept','','','','','','','','')";
    $can = "INSERT INTO `canteen`(`id`, `due`, `cost`) VALUES ('$id','','')";
    $cred = "INSERT INTO `user_credential`(`id`, `pass`) VALUES ('$id','$id')";



    if (mysqli_query($connection, $my_query) && mysqli_query($connection, $personal) && mysqli_query($connection, $can) && mysqli_query($connection, $cred)) {
        echo "Insert Successfully";
    } else {
        echo "Not Inserted!!!";
    }
    print '<script>alert("Successfully Updated!");</script>';      // Prompts the user
    print '<script>window.location.assign("updateAdmin.html");</script>'; // redirects to 


}
