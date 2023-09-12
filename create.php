<!DOCTYPE html>
<html>
<head>
    <title>ISBVI</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h2 {
            font-size: 35px;
            color: #47f5e9;
            font-weight: bold;
            font-style: oblique;
            font-family: 'Courier New', Courier, monospace;
        }

        .word_file {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 100px;
        }

        .text-file {
            border: 1px solid #000000;
            background-color: rgb(250, 227, 111);
        }

        h3 {
            font-size: 20px;
        }

        iframe {
            width: 100%;
            height: 100%;
            background-color: rgb(255, 255, 255);
            background-image: none;
            border: solid 1px;
        }
    </style>
</head>
<body>
<a href="https://www.in.gov/isbvi/"><img id="left" src="images/purdue2.jpg" width="300" height="100"></a>
<a href="https://kalasalingam.ac.in/"><img id="right" src="images/logo.png" width="400" height="100"></a><br><br>
<ul>
    <li><a href="index.php">HOME</a></li>
    <li><a href="team.html">TEAM</a></li>
    <li><a href="contributors.html">CONTRIBUTORS</a></li>
    <li><a href="isbvi.html">ISBVI</a></li>
    <li><a href="purdue.html">PURDUE UNIVERSITY</a></li>
    <li><a href="kare.html">KALASALINGAM UNIVERSITY</a></li>
    <li style="float:right"><a class="active" href="contact.html">contact us</a></li>
</ul><br>

<h2 align="center"><b>LEARNING EQUATIONS ACROSS PLATFORMS (LEAP)</b></h2><br>
<div class="word_file">
    <?php
    if (isset($_POST['join_name'])) {
        $tableName = $_POST['join_name'];
    
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
    
        $sql = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $studentName = $row['name'];
                $studentData = nl2br($row['data']);
                echo '<div class="text-file">';
                echo '<h3 align="center">' . $studentName . '</h3>';
                echo '<iframe src="data:text/html;charset=utf-8,' . htmlspecialchars($studentData) . '"></iframe>';
                echo '</div>';
            }
        } else {
            echo "No data found in table '$tableName'.";
        }
    
        mysqli_close($conn);
    }
    ?>
</div>
</body>
<script>
    setInterval(function () {
        location.reload();
    }, 5000);
</script>
</html>
