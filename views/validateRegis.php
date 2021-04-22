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

    <!-- GOOGLE FONTS-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Montserrat+Alternates:wght@100;300;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- CSS FILE -->

    <link rel="stylesheet" href="../css/styles.css">

    <!--MATERIALIZE
    <link rel="stylesheet" href="../css/materialize/css/materialize.min.css"> -->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
</head>

<body>


    <!--PHP-->
    <?php

    /* CONFIG FILE*/

    include('../views/config.php');

    sleep(1);
    if (isset($_POST)) {

        $username = $_POST['username'];
        $sql_user = 'SELECT * FROM usercat WHERE username=?';
        $result = $connection->prepare($sql_user);

        $result->bindParam(1, $username);


        $result->execute();
        $count = $result->rowCount();


        if ($count > 0) {
            echo '<div class="alert alert-danger">Username already exist</div>';
        } else {
            echo '<div class="alert alert-success">Username available</div>';
        }
    } elseif (isset($_POST)) {

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
    } else {

        $sql_insert = "INSERT INTO usercat (username, user_mail, user_password) VALUES (?,?,?)";
        $result2 = $connection->prepare($sql_insert);

        $result2->bindParam(1, $username);
        $result2->bindParam(2, $email);
        $result2->bindParam(3, $password);


        $result2->execute();

        echo "<div style='text-align:center;margin-top:140px;'>
                  <h2 id='message'>Thank you for the registration <strong> $username </strong>.</h2> 
                  <h3>We´ll redirect you to login page soon !</h3>
                  </div>";
        header("refresh:10;url=login.php");
    }


    ?>



    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->

    <script src="css/materialize/js/materialize.min.js"></script>
</body>

</html>