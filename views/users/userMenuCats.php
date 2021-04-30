<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <!-- Compiled and minified CSS 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->

    <!-- Materialize icons -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Montserrat+Alternates:wght@100;300;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- css file -->
    <link rel="stylesheet" href="../../css/styles.css">

    <!--MATERIALIZE-->
    <link rel="stylesheet" href="../../css/materialize/css/materialize.min.css">

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="../../assets/fontAwesome/fontawesome/css/all.min.css">

</head>

<body>

    <!-- NAV -->

    <nav class=" nav" style=" background-image: linear-gradient(to right,#4A569D,#DC2424);min-height: 130px;">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a><i class="fas fa-cat fa-5x"></i>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a id="options" href="../views/aboutUs.html">About us</a></li>
                    <li><a id="options" href="../views/userRegister.php">Blog</a></li>
                    <li><a id="options" href="../views/userLogin.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    include('../../views/config.php');

    ?>

    <!--INTRO -->


    <div class="intro center" style="margin-top:150px;">
        <h4>Choose an option to consult the cats we have for adoption</h4><br>
        <a href="#"><button class="waves-effect waves-light btn-large" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;">Adult cats
            </button></a>
        <a href="#"><button class="waves-effect waves-light btn-large" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;">Kitten
            </button></a>
        <a href="#"><button class="waves-effect waves-light btn-large" style="background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:150%;">Special cases
            </button></a>

    </div>



    <!-- FOOTER -->
    <!-- FOOTER -->

    <footer class="page-footer" style="background-image: linear-gradient(to right,#4A569D,#DC2424); margin-top: 160px;">
        <div class="footer-copyright">
            <div class="container center">
                Copyright © 2021 Sergi Sánchez
            </div>
        </div>
    </footer>



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Compiled and minified JavaScript 
    <script src="css/materialize/js/materialize.min.js"></script>-->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
</body>

</html>