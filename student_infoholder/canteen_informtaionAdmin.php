<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="NA File Server.png">
    <link rel="stylesheet" href="student.css">
    <title>Canteen Information</title>
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
$query = mysqli_query($connection, "SELECT * from personal_info WHERE id='$user'");
$rows = mysqli_fetch_array($query);
if($rows['id']==NULL){
    print '<script>alert("Invalid Id");</script>';      // Prompts the user
    print '<script>window.location.assign("canteenSearchAdmin.html");</script>'; // redirects to 
}
?>

<body background="Background.jpg">
    <nav>
        <label>Canteen Info</label>

        <div class="stu-info">
            <li>
                <p>ID : </p>
                <div class="inp-data">
                    <?php

                    if ($rows['id'] != NULL)
                        print '<td align="center">' . $rows['id'] . "</td>";
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
                    if ($rows['department'] != NULL)
                        print '<td align="center">' . $rows['department'] . "</td>";
                    else
                        print '<td align="center">'  . "</td>";

                    ?>
                </div>
            </li>
        </div>

        <div class="menu-text">
            <li><a href="dashboardAdmin.html">Dashboard</a></li>
            <li><a href="canteenSearchAdmin.html">Back</a></li>
        </div>
    </nav>

    <br>
    <br>




    <table border="1px" class="data-table">
        <tr>
           
            <th>COST</th>
            <th>DUE</th>
            

        </tr>

        <?php

        $query = mysqli_query($connection, "SELECT * from canteen WHERE id='$user'");
        $row = mysqli_fetch_array($query);
        print "<tr>";
        
        print '<td align="center">' . $row['cost'] . "</td>";
        print '<td align="center">' . $row['due'] . "</td>";
        
        print "</tr>";

        ?>

    </table>




</body>

</html>

<?php
