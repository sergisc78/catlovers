<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin menu</title>

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

    <link rel="stylesheet" href="../../css/styles.css">

    <!--MATERIALIZE
    <link rel="stylesheet" href="../css/materialize/css/materialize.min.css"> -->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />

</head>

<body>

    <?php

    session_start();

    if (!isset($_SESSION['admin_name'])) { // SINO HA FET LOGIN NO ES POT ENTRAR A L´APLICACIÓ

        header("location:adminLogin.php");
    }

    ?>

    <!-- NAV -->

    <nav class="nav" style="background-image: linear-gradient(to right,#4A569D,#DC2424);min-height: 130px;">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a><i class="fas fa-cat fa-5x"></i>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <a href="../index.html" class="btn-large" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:100%;color:white">Log out</a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MENU -->

    <!-- Dropdown Trigger -->

    <div class="intro center" style="margin-top:140px;">
        <h4>You can consult or add cats or you can also consult users.</h4><br><br><br>
        <a class='dropdown-trigger btn-large' href='#' data-target='dropdown1' style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;">Adult cats</a>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="../admin/adult/addAdultCat.php" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Add an adult cat</a></li>
            <li><a href="../admin/adult/viewAllAdultCats.php" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white"> Consult adult cats</li>
        </ul>

        <a class='dropdown-trigger btn-large' href='viewAdultCats.php' data-target='dropdown2' style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;">Kitten</a>

        <ul id='dropdown2' class='dropdown-content'>
            <li><a href="../admin/kitten/addKitten.php" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Add a kitten</a></li>
            <li><a href="../admin/kitten/viewAllKitten.php" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Consult kitten</li>
        </ul>

        <a class='dropdown-trigger btn-large' href='#' data-target='dropdown3' style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;">Special cases</a>

        <ul id='dropdown3' class='dropdown-content'>
            <li><a href="../admin/special/addSpecial.php" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Add a special case</a></li>
            <li><a href="../admin/special/viewAllSpecial.php" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Consult special cases</li>
        </ul>

        <a class='dropdown-trigger btn-large' href='#' data-target='dropdown4' style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Users</a>

        <ul id='dropdown4' class='dropdown-content'>
            <li><a href="#!" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;color:white">Consult users</a></li>
        </ul>
    </div>


    <!-- FOOTER -->

    <footer class="page-footer" style="background-image: linear-gradient(to right,#4A569D,#DC2424);">
        <div class="footer-copyright">
            <div class="container center">
                Copyright © 2021 Sergi Sánchez
            </div>
        </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- <script src="css/materialize/js/materialize.min.js"></script> -->

    <!-- JAVASCRIPT ALERTIFY -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });

        /* DROPDOWN */

        $('.dropdown-trigger').dropdown();

    </script>
</body>

</html>