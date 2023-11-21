<?php
    session_start(); // Start the session

    if (!isset($_SESSION['rfiduid'])) {
        header("Location: loginPage.php");
        exit();
    }
    
    require_once('dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "./css/styles.css">
    <script src = "./script/jqueryscript.js"></script>
    <script src = "./script/sheetjs.js"></script>
    <script src = "./script/script.js"></script>
    <title>ACAS</title>
</head>
<body class = "indexBody">
    <div class = "headerContainer">
        <img src = "./images/ACAS logo.png" class = "acasLogo">
        <nav>
            <a href="eventPage.php">Event</a>
            <button class = "exportBtn" onclick = "exportToExcel('attendanceTable')">Export</button>
            <a href="logout.php">Log out</a>
        </nav>
    </div>
    <div class = "mainContainer">
        <div class = "navContainer">
            <form method = "POST" class = "rfidtxtBox">
                <input type = "password" placeholder = "RFID" name = "rfiduid" id = "rfiduid">
            </form>
            <?php
                require_once('eventInfo.php');
            ?>
        </div>
        <div class = "attendanceContainer">
                <?php
                    require_once('addStudent.php');
                    require_once('viewData.php');
                    require_once('resetTime.php');
                ?>
        </div>
    </div>
</body>
</html>