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
$user = $_POST['sid'];

$query = mysqli_query($connection, "SELECT DISTINCT personal_info.* , hostel.* FROM hostel LEFT JOIN personal_info ON hostel.id=personal_info.id WHERE hostel.id='$user'");
$row = mysqli_fetch_assoc($query);
if($row['id']==NULL){
    print '<script>alert("Invalid Id");</script>';      // Prompts the user
    print '<script>window.location.assign("hostel_SearchAdmin.html");</script>'; // redirects to 
}

?>

<body background="Background.jpg">

<nav>
       <label>Hostel Info</label>
       <div class="menu-text">
            <li><a href="dashboardAdmin.html">Dashboard</a></li>
            <li><a href="hostel_SearchAdmin.html">Back</a></li>
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
                    <h3>Phone</h3>
                </div>
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
                    <h3>since</h3>
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
                    <h3>Next Due</h3>
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