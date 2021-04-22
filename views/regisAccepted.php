<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing in</title>

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

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />

    <script src="../js/alertify.js"></script>

</head>

<body>


    <!-- NAV -->

    <nav class="nav" style="background-image: linear-gradient(to right,#4A569D,#DC2424);min-height: 130px;">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a><i class="fas fa-cat fa-5x"></i>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../views/register.php">Back to register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PHP -->

    <?php

    /* CONFIG FILE*/

    include('../views/config.php');

    /* VARIABLES*/

    $username = $_POST['username'];
    //$password = $_POST['password'];
    //$cPassword = $_POST['cpassword'];
    //$email = $_POST['email'];


    /* IF USER EXIST */

    if (isset($_POST['submit'])) {

        $sql_user = 'SELECT * FROM usercat WHERE username=?';
        $result = $connection->prepare($sql_user);

        $result->bindParam(1, $username);


        $result->execute();
        $count = $result->rowCount();

        if ($count != 0) {

           /* echo "<div style='text-align:center;margin-top:140px;'>
            <span id='message'>Username or email exist</span> 
            </div>";
            //header("refresh:5;url=register.php");*/

            echo "Fucking shit";


            /* INSERT USER */
        } else {

          /*  $sql_insert = "INSERT INTO usercat (username, user_mail, user_password) VALUES (?,?,?)";
            $result2 = $connection->prepare($sql_insert);

            $result2->bindParam(1, $username);
            $result2->bindParam(2, $email);
            $result2->bindParam(3, $password);


            $result2->execute();

            echo "<div style='text-align:center;margin-top:140px;'>
                  <h2 id='message'>Thank you for the registration <strong> $username </strong>.</h2> 
                  <h3>We´ll redirect you to login page soon !</h3>
                  </div>";
            header("refresh:10;url=login.php");*/

            echo "Fucking great";
        }
    }


    ?>


    <!-- FOOTER -->

    <footer class="page-footer" style="background-image: linear-gradient(to right,#4A569D,#DC2424); margin-top: 160px;">
        <div class="footer-copyright">
            <div class="container center">
                Copyright © 2021 Sergi Sánchez
            </div>
        </div>
    </footer>


    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->

    <script src="css/materialize/js/materialize.min.js"></script>

</body>

</html>