<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['isLogin'] === "si") {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MSVG | Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            Monitoreo de Signos Vitales en Gestantes
        </header>
        <section class="content-login">
            <div class="row">
                <figure class="content-logo">
                    <img src="img/logo_sistema3v3.png" width="300px">
                </figure>
                <div class="contenedor">
                    <form id="frmLogin" method="post">
                        <span id="msg"  style="color: #FF5722;">&nbsp;</span>
                        <input type="hidden" name="action" value="login">
                        <input id="user"type="text" name="user" placeholder="Usuario" required="">
                        <input id="pass"type="password" name="pass" placeholder="Contraseña" required="">
                        <button id="btningresar" type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </section>
        <footer>
            <div class="f1"> <span class="gxdstudio">Gabriela G.</span></div>
        </footer>
        
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/app.js"></script>

        <script type="text/javascript">
            $('#user').focus();
            $(function() {
                $('#frmLogin').submit(function(event) {
                    event.preventDefault();
                    $("#btningresar").html("<img src='img/cargando.gif?r=222'class=\"preload\" >");
                    $.ajax({
                        type: 'POST',
                        url: 'crl/usuarioCRL.php',
                        data: $('#frmLogin').serialize(),
                        success: function(data) {
                            if (data === "si") {
                                location.href = "index.php";
                            } else if (data === "no") {
                                $("#msg").text("Contraseña o Usuario incorrecto");
                                $("#btningresar").html("Entrar");
                                $('#user').focus();
                            }
                        },
                        error: function() {
                            $("#msg").text("Contraseña o Usuario incorrecto");
                                $("#btningresar").html("Entrar");
                                $('#user').focus();
                        }
                    });
                });
            });
        </script>
    </body>
</html>
