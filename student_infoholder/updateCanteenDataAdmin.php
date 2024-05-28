<html>

<head>
    <title>Canteen Information</title>
    <link rel="icon" href="NA File Server.png">
    <link rel="stylesheet" href="add-update.css">
</head>


<?php

session_start();


$_SESSION['ssid'] = $_POST['sid'];


$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "raiko";
$connection = mysqli_connect($serverName, $userName, $password, $dbname);
if ($connection == false) {
    die("Error!!!" . mysqli_connect_error());
}

$user = $_POST['sid'];
$query = mysqli_query($connection, "SELECT * from canteen WHERE id='$user'");
$rows = mysqli_fetch_assoc($query);


$query2 = mysqli_query($connection, "SELECT * from personal_info WHERE id='$user'");

$row = mysqli_fetch_assoc($query2);

if($row['id']==NULL){
    print '<script>alert("Invalid Id");</script>';      // Prompts the user
    print '<script>window.location.assign("updateCanteenSearchAdmin.html");</script>'; // redirects to 
}

?>

<body background="Background.jpg">


    <nav>
        <label>Student Canteen Info</label>
        <div class="menu-text">
        <li><a href="updateAdmin.html">Dashboard</a></li>
            <li><a href="updateCanteenSearchAdmin.html">Back</a></li>
        </div>
    </nav>

    <br>
    <div class="table">
        <div class="main">
            <div class="content">
                <div class="data-cell">
                    <h3>Name</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['first_name'] != NULL)
                        print '<td align="center">' . $row['first_name'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>ID</h3>
                </div>
                <div class="data-cell">
                    <?php
                    print '<td align="center">' . $user . "</td>";
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>Batch</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['section'] != NULL)
                        print '<td align="center">' . $row['section'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>Department</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['department'] != NULL)
                        print '<td align="center">' . $row['department'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>

            <div class="content">
                <div class="data-cell">
                    <h3>DUE</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($rows['due'] != NULL)
                        print '<td align="center">' . $rows['due'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>COST</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($rows['cost'] != NULL)
                        print '<td align="center">' . $rows['cost'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>



    <div class="table">
    <h4 class="add-update">ADD/Update Information</h4>
    
    <div class="main">

        <form action="updateCanteenInfoAdmin.php" method="post">
            <div class="content">
                <div class="form">
                    <h3>ADD COST</h3>
                </div>
                <div class="form"><input type="number" name="addcost"></div>
            </div>
            <div class="content">
                <div class="form">
                    <h3>ADD DUE</h3>
                </div>
                <div class="form"><input type="number" name="adddue"></div>
            </div>

            <div class="content">
                <div class="form">
                    <h3>ERASE DUE</h3>
                </div>
                <div class="form"><input type="number" name="erasedue"></div>
            </div>

            <div class="sub-btn">
                <button type="submit" value="Save">Save</button>
            </div>
        </form>
    </div>
    </div>

   



</body>

</html>