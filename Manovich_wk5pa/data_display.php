<?php session_start(); ?>
<html>

<head>
    <title>Week5 PA - Monice Manovich</title>
</head>

<body>
    <h2>The Name in the Cookie is:
        <?php echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : "No Entry"; ?>
    </h2>

    <h2>The Birthdate in the Session is:
        <?php echo $_SESSION['user_dob']; ?>
    </h2>
    <br>
    <a href="data_entry.php">Back to Data Entry Page</a>
</body>

</html>