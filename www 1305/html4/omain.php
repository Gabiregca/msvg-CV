<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['isLogin'] === "si") {
        $cargo = $_SESSION['cargo'];
        $mensaje = $_SESSION['msg'];
        ?>
        <!DOCTYPE html>
        <html class="metro">
            <head>
                <meta charset="UTF-8">
                <title>Opticenter | <?= $cargo; ?></title>
                <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
                <link rel="stylesheet" type="text/css" href="css/app.css">
                <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
                <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
                <style>
                    @media screen and (max-width:1280px){
                        header{
                            text-align: center;
                            font-size: 20px;
                        }
                        figure{
                            width: 100%;
                            margin: 0px auto;
                            z-index: -1;
                        }
                        figure img{
                            width: 100%;
                        }
                        .contenedor{
                            margin-top: -10px;
                        }
                        button{
                            margin-top: 7px;
                        }
                        #med,#his,
                        #logos,
                        #cargo,
                        .msgSys{
                            display: none;
                        }
                        .marca{
                            width: 60%;
                        }
                        .nav li a {
                            padding: 0 16px 0 16px;  
                        }
                        .icon-agregar:before,
                        .icon-dia:before{
                            margin: 0px !important;
                        }
                        #desplegar ul,
                        #desplegar{
                            width: 190px !important;
                        }
                        ::-webkit-scrollbar{
                            width: 5px;
                        }
                        ::-webkit-scrollbar-button{
                            width:8px;
                            height: 5px;
                        }
                        ::-webkit-scrollbar-track{
                            background:gainsboro;
                            -webkit-border-radius: 10px; 
                            border-radius: 10px; 
                        }
                        ::-webkit-scrollbar-thumb{
                            background:gray;
                            border-radius: 10px;
                            -webkit-border-radius: 10px;
                        }
                        ::-webkit-scrollbar-thumb:hover{
                            background:rgba(0,0,0,.6);
                        }
                        ::-webkit-scrollbar-thumb:window-inactive {
                            background: rgba(0,0,0,.1);
                        }
                        /*
                        .modalbox{
                            zoom: 50%;
                        }
                        
                        iframe{
                            overflow-y: scroll !important;
                        }.modalbox{
                            display: none;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            top: 0px;
                            left:0px;
                            -webkit-transform: none;
                            -moz-transform: none;
                            -ms-transform: none;
                            -o-transform: none;
                            transform: none;
                            background: transparent;
                            margin: 0px!important;
                            padding: 0px !important;
                            box-shadow: none;
                        } 
                        .close {
                            background: #111;
                            color: #FFFFFF;
                            line-height: 25px;
                            position: absolute;
                            right: 3px;
                            text-align: center;
                            top: 1px !important;
                            height: 39px;
                            width: 40px;
                            text-decoration: none;
                            font-weight: bold;
                        }
                        .close:hover { 
                            background: #E53935; 
                            color: white;
                        }
                        .modalbox h2{
                            margin: 0px !important;
                            background: #2979FF;
                            color: white;
                            font-size: 28px;
                            height: 45px !important;
                            padding: 7px 0 2px 20px;
                            font-weight: 400;
                            position: relative;
                            text-shadow: 2px 3px 10px rgba(0,0,0,0.5);
                        }
                        .modalbox a{
                            position: absolute;
                            top: -0.5px;
                            margin: 0px;
                            right: -2px;
                            background: #2962FF;
                            padding: 13.8px 7px 0px;
                            z-index: 9;
                        }
                        iframe{
                            overflow-y: hidden;
                            width: calc(100% + 40px);
                            height: calc(100% - 15px);
                            margin: 0px;
                            border: none;
                        }

                        .modal{
                            margin: 20px 10px;
                            background: #EEEEEE;
                            height: auto;
                        }
                        .modal label{
                            color: #7D7D7D;
                            display: block;
                            font-weight: bold;
                            letter-spacing: -0.5px;
                            font-size: 17px;
                            padding-bottom: 5px;
                            padding-top: 5px;
                        }
                        .modal input{
                            width: calc(100% - 18px);
                            outline: none;
                            padding: 5px 8px;
                            font-size: 15px;
                            border: 1px solid #A4A4A4; 
                        }
                        .modal input:focus{
                            focus
                            border-color: #2780f8 !important;
                            -webkit-box-shadow: 0 0 7px rgba(39,128,248,0.15);
                            -moz-box-shadow: 0 0 7px rgba(39,128,248,0.15);
                            box-shadow: 0 0 7px rgba(39,128,248,0.15);
                            outline-offset: 0;
                            outline: 0;
                        }
                        .modal select{
                            width: 100%;
                            outline: none;
                            padding: 4px 0;
                            font-size: 15px;
                            border: 1px solid #A4A4A4;
                        }
                        .modal select:focus{
                            outline: 1px solid #2196F3;
                        }
                        .modal button{
                            border: none;
                            background-color: #2962FF;
                            border-radius: 0.5em;
                            color: white;
                            margin-top: 20px;
                            margin-right: 5px;
                            padding: 12px 0px;
                            width: 110px;
                            outline: 0px;
                            font-size: 17px;
                            cursor: pointer;
                            -webkit-transition: all 0.3s;
                        }
                        .modal button:hover{
                            background: #2196F3;
                            //box-shadow: 2px 4px 7px rgba(0,0,0,0.2);
                            -webkit-transition: all 0.3s;
                        }
                        .modal button:active {
                            ///box-shadow: none;
                            background-color: #1976D2;
                            //border-bottom: 1px solid #11335B;
                        }
                        .modal .formulario table{
                            width: 100%;   
                        }
                        .modal .formulario table tr td{
                            margin-right: 2.5px;
                            margin-left: 2.5px;
                        }
                        .modal .botones{
                            text-align: right;
                            position: relative;
                        }
                        .modal .atras{
                            text-align: left;
                            position: relative;
                            top: -10px;
                        }
                        .modal .botones h2{
                            text-align: left;
                            position: absolute;
                            color: #8B96A6;
                            margin-left: 5px;
                            font-size: 31px;
                        }
                        .modal h3{
                            text-align: left;
                            position: absolute;
                            color: #7D7D7D;
                            margin-left: 1px;
                            font-size: 16px;
                            margin-top: 10px;
                            font-weight: normal;
                        }
                        .modal .botones h2 span{
                            color: #7D7D7D;
                            margin-left: 5px;
                            font-size: 20px;

                        }
                        .modal .botones .btnn{
                            margin-top: 0px;
                        }*/
                    }
                </style>
            </head>
            <body>
                <header>
                    <nav>
                        <ul class="nav">
                            <li id="cargo">
                                <a href="#"><?= strtoupper($_SESSION['cargo']); ?></a>
                            </li>
                            <li onclick="openModal('medicion');">
                                <a href="#" class="borde-izquierdo-none icon-agregar"><span id='med'>Medición</span></a>
                            </li>
                            <li  onclick="openModal('historial');">
                                <a href="#" class="borde-izquierdo icon-dia"><span id="his">Historial</span></a>
                            </li>
                            <li id="desplegar">
                                <a href="#" class="icon-desplegar"><?= $_SESSION['minNom']; ?> <?= $_SESSION['minApe']; ?></a>
                                <ul class="subnav">
                                    <li onclick="logout();"><a href="#">Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </header>
                <section id="right" style="">
                    <img src="img/logo_sistema.png" class="marca">
                </section>
                <div id="logos" style="position: absolute;bottom: 35px;left: 25px; background: url(img/GXDventasLogo.svg);width: 200px;height: 45px;"></div>
                
                <footer>
                    <div class="msgSys icon-mensaje"><?= $mensaje ?></div>
                    <div class="f1">Software creado por <span class="gxdstudio">GXDstudio</span></div>
                </footer>
                <?php require './modal.php'; ?>
                <script>
                    var tiendaUser = "<?= $_SESSION['tienda'] ?>";
                    var nombreUser = "<?= $_SESSION['minNom']; ?> <?= $_SESSION['minApe']; ?>";
                </script>
                <script src="js/jquery-2.1.1.min.js"></script>
                <script src="js/app.js"></script>
            </body>
        </html>
        <?php
    } else {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
?>