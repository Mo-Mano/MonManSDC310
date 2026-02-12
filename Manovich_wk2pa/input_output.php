<html>

<head>
    <title>Week 2 Performance Assessment Monice Manovich</title>
</head>

<body>
    <form method='POST'>
        <h3>Enter your name: <input type='text' name="name" /></h3>
        <h3>Enter your birthdate: <input type='text' name="bdate" /></h3>
        <h3>Enter your favorite color: <input type='text' name="fcolor" /></h3>
        <h3>Enter your favorite place to visit: <input type='text' name="fplace" /></h3>
        <h3>Enter your nickname: <input type='text' name="nickname" /></h3>
        <input type='submit' name='submit_btn' value='Submit Values' />
    </form>
    <?php

    $name = '';
    $birthdate = '';
    $favorite_color = '';
    $favorite_place = '';
    $nickname = '';

    if (isset($_POST['name']))
        $name = $_POST['name'];
    if (isset($_POST['bdate']))
        $birthdate = $_POST['bdate'];
    if (isset($_POST['fcolor']))
        $favorite_color = $_POST['fcolor'];
    if (isset($_POST['fplace']))
        $favorite_place = $_POST['fplace'];
    if (isset($_POST['nickname']))
        $nickname = $_POST['nickname'];

    var_dump($favorite_place);
    var_dump($nickname);

    if (isset($_POST['submit_btn'])) {
        if (strlen($name) > 0) {
            echo "<h3>The name you entered is: $name </h3>";
        } else {
            echo "<h3>You did not enter a name! </h3>";
        }
        if (strlen($birthdate) > 0) {
            echo "<h3>The birthdate you gave is: $birthdate </h3>";
        } else {
            echo "<h3>You did not enter a birthdate! </h3>";
        }
        if (strlen($favorite_color) > 0) {
            echo "<h3>You said your favorite color is: $favorite_color </h3>";
        } else {
            echo "<h3>You did not enter a favorite color! </h3>";
        }
        if (strlen($favorite_place) > 0) {
            echo "<h3>You said your favorite place to visit is: $favorite_place </h3>";
        } else {
            echo "<h3>You did not enter a favorite place! </h3>";
        }
        if (strlen($nickname) > 0) {
            echo "<h3>You said your nickname is: $nickname </h3>";
        } else {
            echo "<h3>You did not enter a nickname! </h3>";
        }
    }
    ?>
</body>

</html>