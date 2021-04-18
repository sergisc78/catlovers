<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

    <!-- FORM LOGIN -->

    <h3 class="center">Login</h3>
    <div class="row">
        <form action="loginValidate.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s6"><br>
                    <input id="icon_text" type="text" class="validate" name="username" data-lenght="20">
                    <label for="icon_text">Username</label>
                </div>
                <div class="input-field col s6"><br>
                    <input id="icon_prefix" type="text" class="validate" name="password" data-lenght="10">
                    <label for="icon_prefix">Password</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" id="send" type="submit" name="submit">Login</button>
        </form>
    </div>





    <!-- FOOTER -->

    <footer class="footer-copyright blue-darker-4 center">
        <div class="container">
            Sergi Sánchez @2021
        </div>
    </footer>


    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->


    <script src="css/materialize/js/materialize.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });

        $(document).ready(function() {
            $('input#input_text').characterCounter();
        });
    </script>
</body>

</html>