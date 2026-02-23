<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sdc310_wk3pa";
$conn = mysqli_connect($hostname, $username, $password, $dbname);

$userNo = 0;
$fullName = '';
$birthdate = '';
$favoriteColor = '';
$nickname = '';

$add = false;
$edit = false;
$delete = false;
$update = false;

if (isset($_POST['user_no'])) {
    $userNo = $_POST['user_no'];
    $add = isset($_POST['add']);
    $update = isset($_POST['update']);
    $edit = isset($_POST['edit']);
    $delete = isset($_POST['delete']);
}
if ($add) {
    $fullName = $_POST['fullName'];
    $birthdate = $_POST['birthdate'];
    $favoriteColor = $_POST['favoriteColor'];
    $favoritePlace = $_POST['favoritePlace'];
    $nickname = $_POST['nickname'];

    $addQuery = "INSERT INTO personal_info (FullName, Birthdate, FavoriteColor, FavoritePlace, Nickname)
                 VALUES ('$fullName', '$birthdate', '$favoriteColor', '$favoritePlace', '$nickname')";
    mysqli_query($conn, $addQuery);

    $userNo = -1;
    $fullName = "";
    $birthdate = "";
    $favoriteColor = "";
    $favoritePlace = "";
    $nickname = "";
} else if ($edit) {
    $selQuery = "SELECT * FROM personal_info WHERE UserNo = $userNo";
    $result = mysqli_query($conn, $selQuery);
    $userInfo = mysqli_fetch_assoc($result);

    $fullName = $userInfo['FullName'];
    $birthdate = $userInfo['Birthdate'];
    $favoriteColor = $userInfo['FavoriteColor'];
    $favoritePlace = $userInfo['FavoritePlace'];
    $nickname = $userInfo['Nickname'];
} else if ($update) {
    $fullName = $_POST['fullName'];
    $birthdate = $_POST['birthdate'];
    $favoriteColor = $_POST['favoriteColor'];
    $favoritePlace = $_POST['favoritePlace'];
    $nickname = $_POST['nickname'];

    $updQuery = "UPDATE personal_info SET 
                 FullName = '$fullName', Birthdate = '$birthdate', 
                 FavoriteColor = '$favoriteColor', FavoritePlace = '$favoritePlace', 
                 Nickname = '$nickname' 
                 WHERE UserNo = $userNo";
    mysqli_query($conn, $updQuery);

    $userNo = -1;
    $fullName = "";
    $birthdate = "";
    $favoriteColor = "";
    $favoritePlace = "";
    $nickname = "";
} else if ($delete) {
    $delQuery = "DELETE FROM personal_info WHERE UserNo = $userNo";
    mysqli_query($conn, $delQuery);

    $userNo = -1;
}

$query = "SELECT * FROM personal_info";
$result = mysqli_query($conn, $query);
?>

<style>
    table {
        border-spacing: 8px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: lightseagreen;
    }

    tr:nth-child(even) {
        background-color: lightcyan;
    }

    tr:nth-child(odd) {
        background-color: lightyellow;
    }
</style>
<html>

<head>
    <title>Monice Manovich Wk 3 Performance Assessment</title>
</head>

<body>
    <h2>Monice Manovich Wk 3 Performance Assessment</h2>
    <table>
        <tr style="font-size:large;">
            <th>User #</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Favorite Color</th>
            <th>Favorite Place To Visit</th>
            <th>Nickname</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($result)):; ?>
            <tr>
                <td><?php echo $row["UserNo"]; ?></td>
                <td><?php echo $row["FullName"]; ?></td>
                <td><?php echo $row["Birthdate"]; ?></td>
                <td><?php echo $row["FavoriteColor"]; ?></td>
                <td><?php echo $row["FavoritePlace"]; ?></td>
                <td><?php echo $row["Nickname"]; ?></td>
                <td>
                    <form method='POST'>
                        <input type="submit" value="Edit" name="edit">
                        <input type="hidden" value="<?php echo $row["UserNo"]; ?>" name="user_no">
                    </form>
                </td>
                <td>
                    <form method='POST'>
                        <input type="submit" value="Delete" name="delete">
                        <input type="hidden" value="<?php echo $row["UserNo"]; ?>" name="user_no">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <hr>

    <form method="POST">
        <input type="hidden" value="<?php echo $userNo; ?>" name="user_no">

        <h3>Enter your name: <input type="text" name="fullName" value="<?php echo $fullName; ?>" required></h3>
        <h3>Enter your date of birth: <input type="text" name="birthdate" value="<?php echo $birthdate; ?>" required></h3>
        <h3>Enter your favorite color: <input type="text" name="favoriteColor" value="<?php echo $favoriteColor; ?>" required></h3>
        <h3>Enter your favorite place to visit: <input type="text" name="favoritePlace" value="<?php echo $favoritePlace; ?>" required></h3>
        <h3>Enter your nickname: <input type="text" name="nickname" value="<?php echo $nickname; ?>" required></h3>

        <?php if (!$edit): ?>
            <input type="submit" value="Add User" name="add">
        <?php else: ?>
            <input type="submit" value="Update User" name="update">
        <?php endif; ?>
    </form>
</body>

</html>