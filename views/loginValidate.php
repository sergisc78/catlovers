<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login validation</title>

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

    include('../views/config.php');

    $username = $_POST['username'];
    $password = $_POST['password'];


    /* IF USER EXIST */

    if (isset($_POST['submit'])) {

        $sql_user = 'SELECT * FROM usercat WHERE username=? and user_password=?';
        $result = $connection->prepare($sql_user);

        $result->bindParam(1, $username);
        $result->bindParam(2, $password);

        $result->execute();
        $count = $result->rowCount();


        if ($count != 0) {

            session_start(); // IF USER EXIST, SESSION STARTS

            $_SESSION=$_POST['username'];

            echo "<div class='alert alert-success' role='alert'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <h3 id='message'>Welcome back $username !</h3>
                  </div>";

            header("refresh:5;url=opcions.php");

        }else { // IF USER DOESN´T EXIST OR WRONG DATA
            
            echo "<div class='alert alert-danger' role='alert'>
                 <button type='button' class='close' data-dismiss='alert'>&times;</button>
                 <h3 id='message'>Username or email incorrect !</h3>
                 </div>";

            header("refresh:5;url=login.php");
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