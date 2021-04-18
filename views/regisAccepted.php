<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing in</title>

    <!-- Compiled and minified CSS 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->

    <!-- Materialize icons -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

    <!-- css file -->
    <link rel="stylesheet" href="../css/styles.css">

    <!--MATERIALIZE-->
    <link rel="stylesheet" href="../css/materialize/css/materialize.min.css">

</head>

<body>


    <!-- NAV -->

    <nav class="blue darken-4">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../views/index.html">Home</a></li>
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
    $password = $_POST['password'];
    $cPassword = $_POST['cpassword'];
    $email = $_POST['email'];


    /* IF USER EXIST */

    if (isset($_POST['submit'])) {

        $sql_user = 'SELECT * FROM usercat WHERE username=?';
        $result = $connection->prepare($sql_user);

        $result->bindParam(1, $username);
        

        $result->execute();
        $count = $result->rowCount();

        if ($count != 0) {

            echo "<div class='alert alert-danger' role='alert'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <h3 id='message'>There is an user with the same username !</h3>
                  </div>";
            header("refresh:5;url=register.php");

            /* IF PASSWORDS DON´T COINCIDE */

        } elseif ($password != $cPassword) {

            echo "<div class='alert alert-danger' role='alert'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <h3 id='message'>Password and confirm password don´t coincide !</h3>
                  </div>";
            header("refresh:5;url=register.php");

            /* INSERT USER */

        } else {
            
            $sql_insert = "INSERT INTO usercat (username, user_mail, user_password) VALUES (?,?,?)";
            $result2 = $connection->prepare($sql_insert);

            $result2->bindParam(1, $username);
            $result2->bindParam(2, $email);
            $result2->bindParam(3, $password);
            

            $result2->execute();

            echo "<div class='alert alert-success' role='alert'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <h3 id='message'>Thank you for the registration <strong> $username </strong>. We´ll redirect you to login page soon !</h3>
                  </div>";
            header("refresh:10;url=login.php");
        }
    }


    ?>


    <!-- FOOTER -->

    <footer class="footer-copyright blue-darker-4 center">
        <div class="container">
            Sergi Sánchez @2021
        </div>
    </footer>


    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->

    <script src="css/materialize/js/materialize.min.js"></script>

</body>

</html>