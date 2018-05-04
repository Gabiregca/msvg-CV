<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['isLogin'] === "si") {
        $cargo = $_SESSION['cargo'];
        $mensaje = $_SESSION['msg'];
        $rol=$_SESSION['rol'];
        ?>
        <!DOCTYPE html>
        <html class="metro">
            <head>
                <meta charset="UTF-8">
                  <?php
                if ($cargo == 'PS') {
                    ?>
                  <title>MSVG | <?= $rol; ?></title>
                  <?php
                }else{
                    ?>
                <title>MSVG | <?= $cargo; ?></title>
                  <?php
                }
                    ?>
                <!--meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'-->
                <link rel="stylesheet" type="text/css" href="css/app.css">
                <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
                <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
                <style>
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
                    .loadone{
                        display: none;
                        position: absolute;
                        bottom: 0px;
                        left: 3px;
                        background: white;
                        border: 5px solid white;
                    }
                    .sum{
                        height: 23px;
                        width: 25px;
                        border-radius: 50%;
                        position: absolute;
                        top: 5px;
                        right: 8px;
                        background: #FF534E;
                        z-index: 2;
                        text-align: center;
                        padding-top: 2px;
                        cursor: pointer;
                    }
                    .header-chat{
                        cursor: pointer;
                    }
                    .marca-span{
                        position: absolute;
                        top: calc(65%);
                        left: 30%;
                        color: #008c9d;
                        font-size: 50px;
                    }
                </style>
            </head>
            <body>
                <header>
                    <?php require 'header.php'; ?>
                </header>
                <aside id="left">
                    <?php require 'sidebar.php'; ?>
                </aside>
                <section id="right" style="">
                    <img src="img/logo_sistema2.png" class="marca">
                    <span class="marca-span">Monitoreo de Signos Vitales de Gestantes</span>
                </section>

                <?php
                if ($cargo == 'PS') {
                    ?>
                    <div class="chat">
                        <div class="header-chat" onclick="alternar();">
                            <div class="sum" onclick="alternar();"></div>
                            Alertas
                            <div class="icon" onclick="alternar();"></div>
                        </div>
                        <div class="body-chat">
                            <ul class="list-chat">
                            </ul>
                            <div class="find-chat">
                                <div class="icon-buscar pibuscar"></div>
                                <input type="text" name="pbuscar" id="pbuscar" class="pinputbuscar" placeholder="Buscar">
                                <div class="loadone"></div>
                            </div>  
                        </div>
                    </div>
                    <?php
                }
                ?>
                <footer>
                    <div class="msgSys icon-mensaje"><?= $mensaje ?></div>
                    <div class="f1">S <span class="sponsor">Gabriela G.</span></div>
                </footer>
                <?php require './modal.php'; ?>
                <script>
                    var nombreUser = "<?= $_SESSION['minNom']; ?> <?= $_SESSION['minApe']; ?>";
                </script>
                <script src="js/jquery-2.1.1.min.js"></script>
                <script src="js/app.js"></script>
                <script>
                        limpiarList();
                        loadall();
                        alternar();
                        $('#pbuscar').focus();
                        function limpiarList() {
                            $('.list-chat').html('');
                        }
                        function loadall() {
                            /*$.ajax({
                                type: 'POST',
                                url: 'crl/medicionCRL.php',
                                data: {action: 'listxVenta', fec: fecha()},
                                success: function (data) {
                                    var client = JSON.parse(data);
                                    var string = '';
                                    $('.sum').html(client.length);
                                    for (var i = 0; i < client.length; i++) {
                                        string += '< li class="item-chat"  onclick=\"getDiop(\'' + client[i][0] + '\');\">\n\
                                                   <div class="pac-item">' + client[i][1] + ' ' + client[i][2] + '</div>\n\
                                                   <div class="optometra-item">' + client[i][10] + ' - ' + client[i][3] + ' - ' + client[i][9] + '</div>\n\
                                                   </li>';
                                    }
                                    $('.list-chat').html(string);
                                },
                                error: function () {
                                    msgError("Error del Sistema.", "red");
                                }
                            });*/
                        }
                        function getDiop(id) {
                            var time = new Date().getTime();
                            $('#modalTitulo').html('Punto de Venta');
                            $('#modalIframe').attr('src', 'modulos/ventas.html?med=' + id + '&time=' + time);
                            $('#Modal').css('height', '590px');
                            $('#Modal').css('width', '1155px');
                            $('#Mask').fadeToggle('slow');
                            setTimeout(function () {
                                $('#Modal').fadeToggle('slow');
                            }, 200);
                            //alternar();
                        }
                        function find() {
                            $(".loadone").css('display', 'block');
                            var cod = $("#pbuscar").val();
                            $("#pbuscar").val($("#pbuscar").val().toUpperCase());
                            if (cod == "") {
                                loadall();
                            } else {
                                /*$.ajax({
                                    type: 'POST',
                                    url: 'crl/medicionCRL.php',
                                    data: {action: 'findxVenta', path: cod},
                                    success: function (data) {
                                        var client = JSON.parse(data);
                                        var string = '';
                                        for (var i = 0; i < client.length; i++) {
                                            string += '< li class="item-chat"  onclick=\"getDiop(\'' + client[i][0] + '\');\">\n\
                                                   <div class="pac-item">' + client[i][1] + ' ' + client[i][2] + '</div>\n\
                                                   <div class="optometra-item">' + client[i][10] + ' - ' + client[i][3] + ' - ' + client[i][9] + '</div>\n\
                                                   </li>';
                                        }

                                        $('.list-chat').html(string);
                                    },
                                    error: function () {
                                        msgError("Error del Sistema.", "red");
                                    }
                                });*/
                            }
                            $(".loadone").css('display', 'none');
                            $("#pbuscar").select();
                        }
                        function alternar() {
                            var aux = $('.icon').css('content');
                            if (aux == '\"1\"') {
                                $('.icon').css('background', 'url(img/maximize-01.svg)');
                                $('.icon').css('content', '\"2\"');
                                $('.body-chat').toggle();
                                $('.sum').css('display', 'block');
                            } else if (aux == '\"2\"') {
                                $('.icon').css('background', 'url(img/minimize-01.svg)');
                                $('.icon').css('content', '\"1\"');
                                $('.body-chat').toggle();
                                $('.sum').css('display', 'none');
                            }
                        }
                        $("#pbuscar").keyup(function (e) {
                            if (e.keyCode == 13) {
                                find();
                            } else {
                                limpiarList();
                            }
                        });
                </script>
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