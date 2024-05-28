<html>

<head>
    <title>Canteen Information</title>
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


$query = mysqli_query($connection, "SELECT * from personal_info WHERE id='$user'");

$row = mysqli_fetch_assoc($query);
$total_due = 0;


?>

<body background="Background.jpg">
<nav>
       <label>Canteen Info</label>

       <div class="stu-info">
        <li>
            <p>ID : </p>
            <div class="inp-data">
            <?php

                if ($row['id'] != NULL)
                    print '<td align="center">' . $row['id'] . "</td>";
                else {
                    print   $GLOBALS['user'];
                }
            ?>
            </div>
        </li>
        <li>
            <p>Department : </p>
            <div class="inp-data">
            <?php
                 if ($row['department'] != NULL)
                  print '<td align="center">' . $row['department'] . "</td>";
                 else
                  print '<td align="center">'  . "</td>";

            ?>
            </div>
        </li>
       </div>

       <div class="menu-text">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="student_information.php">Student Info</a></li>
            <li><a href="hostel_informtaion.php">Hostel Info</a></li>
       </div>
  </nav>

<br>
<br>
<br>


    <table border="1px" class="data-table">
        <tr>
           
            <th>COST</th>
            <th>DUE</th>
          
        </tr>

        <?php

        $query = mysqli_query($connection, "SELECT * from canteen WHERE id='$user'");                    // SQL Query
        $row = mysqli_fetch_array($query);
        if ($row['due']>0)
            $GLOBALS['total_due'] += $row['due'];
        print "<tr>";

        print '<td align="center">' . $row['cost'] . "</td>";
        print '<td align="center">' . $row['due'] . "</td>";
    
        print "</tr>";

        ?>

    </table>

    <br>
    
    <div class="total">
        <h2>Total Dues : &nbsp; </h2>
        <div class="t-inp-data">
             <?php
               print '<td align="center">' . $GLOBALS['total_due'] . "</td>";
             ?>
        </div>
    </div>
</body>
</html>
<?php