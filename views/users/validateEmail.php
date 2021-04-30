<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- MATERIALIZE -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- MATERIALIZE ICONS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php

    /* CONFIG FILE */

    include('../../views/config.php');

    /* IF EMAIL IS AVAILABLE OR NOT */

    sleep(1);
    if (isset($_POST)) {


        $email = $_POST['email'];
        $sql_email = 'SELECT * FROM usercat WHERE user_mail=?';
        $result2 = $connection->prepare($sql_email);

        $result2->bindParam(1, $email);


        $result2->execute();
        $count2 = $result2->rowCount();


        if ($count2 > 0) {
            echo '<div class="alert alert-danger">Email already exist.</div>';
        } else {
            echo '<div class="alert alert-success">Email available.</div>';
        }
    }


    ?>
</body>

</html>