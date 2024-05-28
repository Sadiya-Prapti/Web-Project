<html>

<head>
    <title>Personal Information</title>
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
$query = mysqli_query($connection, "SELECT id from user_credential WHERE id='$user'");

$rows = mysqli_fetch_assoc($query);
$name = $rows['id'];

$query = mysqli_query($connection, "SELECT * from personal_info WHERE id='$user'");

$row = mysqli_fetch_assoc($query);


?>

<body background="Background.jpg">


  <nav>
       <label>Student Info</label>
       <div class="menu-text">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="hostel_informtaion.php">Hostel Info</a></li>
            <li><a href="canteen_informtaion.php">Canteen Info</a></li>
       </div>
  </nav>

  <br>
    <div class="table">
        <div class="main">
            <div class="content">
                <div class="data-cell"><h3>First Name</h3></div>
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
                <div class="data-cell"><h3>Last Name</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['last_name'] != NULL)
                            print '<td align="center">' . $row['last_name'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>ID</h3></div>
                <div class="data-cell">
                    <?php
                            print '<td align="center">' . $name . "</td>";
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Batch</h3></div>
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
                <div class="data-cell"><h3>Department</h3></div>
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
                <div class="data-cell"><h3>Credit</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['credit'] != NULL)
                            print '<td align="center">' . $row['credit'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Phone</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['phone'] != NULL)
                            print '<td align="center">' . $row['phone'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Email</h3></div>
                <div class="data-cell">
                    <div class="email">
                    <?php
                            if ($row['email'] != NULL)
                            print '<td align="center">' . $row['email'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Local Address</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['local_address'] != NULL)
                            print '<td align="center">' . $row['local_address'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Permanent Address</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['permanent_address'] != NULL)
                            print '<td align="center">' . $row['permanent_address'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Gender</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['gender'] != NULL)
                            print '<td align="center">' . $row['gender'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Religion</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['religion'] != NULL)
                            print '<td align="center">' . $row['religion'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="data-cell"><h3>Blood Group</h3></div>
                <div class="data-cell">
                    <?php
                            if ($row['blood'] != NULL)
                            print '<td align="center">' . $row['blood'] . "</td>";
                        else {
                            print '<td align="center">'  . "</td>";
                        }
                    ?>
                </div>
            </div>

            <div class="button"><a href="updateinfo.html">Update</a></div>
        </div>
    </div>

</body>

</html>