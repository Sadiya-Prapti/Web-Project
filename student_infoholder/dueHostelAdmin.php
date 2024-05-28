<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="NA File Server.png">
    <link rel="stylesheet" href="student.css">
    <title>Hostel Information</title>
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

?>

<body background="Background.jpg">
    <nav>
        <label>DUES Info</label>

        <div class="menu-text">
            <li><a href="hostel_updateAdmin.html">Hostel Dashboard</a></li>
        </div>
    </nav>

    <br>
    <br>




    <table border="1px" class="data-table">
        <tr>
            <th>ID</th>
            <th>ROOM</th>
            <th>DUE</th>
            <th>Admit Day</th>
            <th>Next Pay Day</th>

        </tr>

        <?php

        $query = mysqli_query($connection, "SELECT * from hostel");
        while ($row = mysqli_fetch_array($query)) {

            if ($row['due'] > 0) {
                print "<tr>";
                print '<td align="center">' . $row['id'] . "</td>";
                print '<td align="center">' . $row['room'] . "</td>";
                print '<td align="center">' . $row['due'] . "</td>";
                print '<td align="center">' . $row['admit'] . "</td>";
                print '<td align="center">' . $row['day'] . "</td>";
                print "</tr>";
            }
        }

        ?>

    </table>




</body>

</html>

<?php
