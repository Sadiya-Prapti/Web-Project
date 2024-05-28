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

        $user = $_SESSION['user'];
        $query = mysqli_query($connection, "SELECT * from personal_info WHERE id='$user'");

        $row = mysqli_fetch_assoc($query);

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $section = $_POST['section'];
        $department = $_POST['department'];
        $credit = $_POST['credit'];
        $phone = $_POST['phn'];
        $email = $_POST['email'];
        $lad = $_POST['lad'];
        $pad = $_POST['pad'];
        $gender = $_POST['gender'];
        $religion = $_POST['religion'];
        $blood = $_POST['blood'];
        $trueGender = 'NULL';
        if ($gender == 1) {
            $trueGender = 'Male';
        }
        if ($gender == 2) {
            $trueGender = 'Female';
        }
        if ($gender == 0) {
            $trueGender = 'NULL';
        }



        if ($row['gender'] != NULL && $trueGender == 'NULL') {

            if ($row['gender'] == 'Male') {
                $trueGender = 'Male';
            }
            else if ($row['gender'] == 'Female') {
                $trueGender = 'Female';
            }
            else {
                $trueGender = ' ';
            }
        }

        if ($row['first_name'] != NULL) {
            if ($firstname == NULL) {
                $firstname = $row['first_name'];
            } else {
                $firstname = $_POST['firstname'];
            }
        } else {
            $firstname = $_POST['firstname'];
        }


        if ($row['last_name'] != NULL) {
            if ($lastname == NULL) {
                $lastname = $row['last_name'];
            } else {
                $lastname = $_POST['lastname'];
            }
        } else {
            $lastname = $_POST['lastname'];
        }


        if ($row['section'] != NULL) {
            if ($section == NULL) {
                $section = $row['section'];
            } else {
                $section = $_POST['section'];
            }
        } else {
            $section = $_POST['section'];
        }

        if ($row['department'] != NULL) {
            if ($department == NULL) {
                $department = $row['department'];
            } else {
                $department = $_POST['department'];
            }
        } else {
            $department = $_POST['department'];
        }
        if ($row['credit'] != NULL) {
            if ($credit == NULL) {
                $credit = $row['credit'];
            } else {
                $credit = $_POST['credit'];
            }
        } else {
            $credit = $_POST['credit'];
        }

        if ($row['phone'] != NULL) {
            if ($phone == NULL) {
                $phone = $row['phone'];
            } else {
                $phone = $_POST['phn'];
            }
        } else {
            $phone = $_POST['phn'];
        }

        if ($row['email'] != NULL) {
            if ($email == NULL) {
                $email = $row['email'];
            } else {
                $email = $_POST['email'];
            }
        } else {
            $email = $_POST['email'];
        }

        if ($row['local_address'] != NULL) {
            if ($lad == NULL) {
                $lad = $row['local_address'];
            } else {
                $lad = $_POST['lad'];
            }
        } else {
            $lad = $_POST['lad'];
        }

        if ($row['permanent_address'] != NULL) {
            if ($pad == NULL) {
                $pad = $row['permanent_address'];
            } else {
                $pad = $_POST['pad'];
            }
        } else {
            $pad = $_POST['pad'];
        }


        if ($row['religion'] != NULL) {
            if ($religion == NULL) {
                $religion = $row['religion'];
            } else {
                $religion = $_POST['religion'];
            }
        } else {
            $religion = $_POST['religion'];
        }

        if ($row['blood'] != NULL) {
            if ($blood == NULL) {
                $blood = $row['blood'];
            } else {
                $blood = $_POST['blood'];
            }
        } else {
            $blood = $_POST['blood'];
        }

        $my_query =  "UPDATE `personal_info` SET `first_name`='$firstname',`last_name`='$lastname',`section`='$section',`department`='$department',`credit`='$credit',`phone`='$phone',`email`='$email',`local_address`='$lad',`permanent_address`='$pad',`gender`='$trueGender',`religion`='$religion',`blood`='$blood' WHERE id='$user'";


        if (mysqli_query($connection, $my_query)) {
            echo "Insert Successfully";
        } else {
            echo "Not Inserted!!!";
        }
        print '<script>alert("Successfully Updated!");</script>';      // Prompts the user
        print '<script>window.location.assign("student_information.php");</script>'; // redirects to 

    ?>