<html>

<head>
    <title>Hostel Information</title>
    <link rel="stylesheet" href="student.css">
    <link rel="icon" href="NA File Server.png">

</head>
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
$query = mysqli_query($connection, "SELECT id from hostel WHERE id='$user'");

$rows = mysqli_fetch_assoc($query);
$name = $rows['id'];

$query = mysqli_query($connection, "SELECT * from hostel WHERE id='$user'");

$row = mysqli_fetch_assoc($query);


?>

<body background="Background.jpg">

<nav>
       <label>Hostel Info</label>
       <div class="menu-text">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="student_information.php">Student Info</a></li>
            <li><a href="canteen_informtaion.php">Canteen Info</a></li>
       </div>
  </nav>
  <br>

    <div class="table">
        <div class="main">
            <div class="content">
                <div class="data-cell">
                    <h3>ID</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['id'] != NULL)
                        print '<td align="center">' . $row['id'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>ROOM</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['room'] != NULL)
                        print '<td align="center">' . $row['room'] . "</td>";
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
                    if ($row['due'] != NULL)
                        print '<td align="center">' . $row['due'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>Admit Day</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['admit'] != NULL)
                        print '<td align="center">' . $row['admit'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell">
                    <h3>Next Due Day</h3>
                </div>
                <div class="data-cell">
                    <?php
                    if ($row['day'] != NULL)
                        print '<td align="center">' . $row['day'] . "</td>";
                    else {
                        print '<td align="center">'  . "</td>";
                    }
                    ?>
                </div>
            </div>

        </div>

    </div>

</body>

</html>