<?php
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

    $user = $_POST['sid'];
    $query = mysqli_query($connection, "SELECT * from hostel WHERE id='$user'");

    $row = mysqli_fetch_assoc($query);
    if($row['id']==NULL){
        print '<script>alert("Invalid Id");</script>';      // Prompts the user
        print '<script>window.location.assign("hostel_informtaionupdateAdminPage.html");</script>'; // redirects to 
    }

    $room = $_POST['room'];
    $due = $_POST['due'];
    $day = $_POST['day'];
    $next = $_POST['nextday'];



    if ($row['room'] != NULL) {
        if ($room == NULL) {
            $room = $row['room'];
        }
    }


    if ($row['due'] != NULL) {
        if ($due == NULL) {
            $due = $row['due'];
        }
    }

    if ($row['admit'] != NULL) {
        if ($day == NULL) {
            $day = $row['admit'];
        }
    }

    if ($row['day'] != NULL) {
        if ($next == NULL) {
            $next = $row['day'];
        }
    }
    $my_query = "UPDATE `hostel` SET `id`='$user',`room`='$room',`due`='$due',`admit`='$day',`day`='$next' WHERE id = '$user'";


    if (mysqli_query($connection, $my_query)) {
        echo "Insert Successfully";
    } else {
        echo "Not Inserted!!!";
    }
    print '<script>alert("Successfully Updated!");</script>';      // Prompts the user
    print '<script>window.location.assign("hostel_updateAdmin.html");</script>'; // redirects to 

