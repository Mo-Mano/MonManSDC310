<?php
//start the session 
session_start();

//Intialize values 
if (!isset($_COOKIE['username'])) {
    $current_name = "";
} else {
    $current_name = $_COOKIE['username'];
}
if (!isset($_SESSION['user_dob'])) {
    $_SESSION['user_dob'] = "";
}

if (isset($_POST['name_input'])) {
    //Set the cookie and session variables
    setcookie('username', $_POST['name_input'], time() + (86400 * 30), "/");
    $_SESSION['user_dob'] = $_POST['dob_input'];
    //Redirect to the display page
    header("Location: data_display.php");
    exit();
}
?>

<html>

<head>
    <title> Week5 PA - Monice Manovich </title>
</head>

<body>
    <h2>Store your name in a cookie and birthdate in the Session</h2>
    <form method="POST">
        <h3>Name: <input type="text" name="name_input" value="<?php echo $current_name; ?>"></h3>
        <h3>Date of Birth: <input type="text" name="dob_input" value="<?php echo $_SESSION['user_dob']; ?>"></h3>

        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="data_display.php">Show Data Display Page</a>
</body>

</html>