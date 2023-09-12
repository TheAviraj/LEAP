<!DOCTYPE html>
<html>
<head>
<title>LEAP</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
    <a href="https://www.in.gov/isbvi/"><img id="left" src="images/purdue2.jpg" width="300" height="100"></a>
    <a href="https://kalasalingam.ac.in/"><img id="right" src="images/logo.png" width="400" height="100"></a>
    <br><br>

    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="leap.html">LEAP</a></li>
        <li><a href="team.html">TEAM</a></li>
        <li><a href="contributors.html">CONTRIBUTORS</a></li>
        <li><a href="isbvi.html">ISBVI</a></li>
        <li><a href="purdue.html">PURDUE UNIVERSITY</a></li>
        <li><a href="kare.html">KALASALINGAM UNIVERSITY</a></li>
        <li style="float:right"><a class="active" href="contact.html">contact us</a></li>
      </ul>
    
    <div id="main" align="center" >
        <h1><b>LEARNING EQUATIONS ACROSS PLATFORMS (LEAP)</b></h1>
        <div class="pp">
            <form method="post" action="index.php">
                <input type="text" name="table_name" maxlength="8" size="10">
                <br>
                <input type="submit" name="create_table" value="CREATE">
                <br>
                </form>
                or
                <form method="post" action="create.php">
                <br>
                <input type="text" name="join_name" maxlength="8" size="10">
                <br>
                <input type="submit" name="join_table" value="JOIN">
            </form>
        </div>        
    </div>
    <?php
    if(isset($_POST['create_table'])){
        $db_config = [
            "host" => "sql.freedb.tech",
            "user" => "freedb_LEAP1",
            "password" => "3X&#m7yTk7gv#gk",
            "database" => "freedb_Leap_KARE",
            "port" => "3306",
        ];

        $conn = mysqli_connect($db_config["host"], $db_config["user"], $db_config["password"], $db_config["database"], $db_config["port"]);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $tableName = mysqli_real_escape_string($conn, $_POST['table_name']);

        $sql = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            data TEXT
        )";

        if (mysqli_query($conn, $sql)) {
            echo "Table '$tableName' created successfully!";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>