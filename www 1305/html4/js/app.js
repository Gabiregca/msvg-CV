//$('.sidebar .item a').click(function () {
//    $(this).parent().children('.subitem').slideToggle('slow');
//    if ($(this).children('span').hasClass('icon-cerrado')) {
//        $(this).parent().parent().find('.icon-abierto').parent().parent().children('.subitem').slideToggle('slow');
//        $(this).parent().parent().find('.icon-abierto').addClass('icon-cerrado');
//        $(this).parent().parent().find('.icon-abierto').removeClass('icon-abierto');
//        $(this).children('span').removeClass('icon-cerrado');
//        $(this).children('span').addClass('icon-abierto');
//    } else {
//        $(this).children('span').removeClass('icon-abierto');
//        $(this).children('span').addClass('icon-cerrado');
//    }
//});
$('.loading').html('<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>');
$('.loadone').html('<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>');
$('.optometra').html('<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>');
function $_GET(param) {
    url = document.URL;
    url = String(url.match(/\?+.+/));
    url = url.replace("?", "");
    url = url.split("&");
    x = 0;
    while (x < url.length)
    {
        p = url[x].split("=");
        if (p[0] == param)
        {
            return decodeURIComponent(p[1]);
        }
        x++;
    }
}
function getUN() {
    var rnom = nombreUser;
    return rnom;
}
function hora() {
    var fecha = new Date();
    var hora = fecha.getHours();
    var minuto = fecha.getMinutes();
    var meridiano = " am";
    if (hora > 12) {
        hora -= 12;
        meridiano = " pm";
    }
    if (hora < 10) {
        hora = "0" + hora;
    }
    if (minuto < 10) {
        minuto = "0" + minuto;
    }
    return (hora + ':' + minuto + meridiano);
}
function horaG() {
    var fecha = new Date();
    var hora = fecha.getHours();
    var minuto = fecha.getMinutes();
    if (hora < 10) {
        hora = "0" + hora;
    }
    if (minuto < 10) {
        minuto = "0" + minuto;
    }
    return (hora + ':' + minuto);
}
function descFec(fec) {
    var afec = fec.split("-");
    var f = new Date(afec[0], (afec[1] - 1), afec[2]);
    //alert(f+"k"+fec);
    var options = {weekday: "long", month: "long", day: "numeric"};
    return(f.toLocaleDateString("es-ES", options));
}
function fecha() {
    var f = new Date();
    var dia = f.getDate();
    var mes = f.getMonth() + 1;
    var anio = f.getFullYear();
    if (dia < 10) {
        dia = "0" + dia;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }
    return (dia + '/' + mes + '/' + anio);
}
function toFecha(fec) {
    var afec = fec.split("-");
    var f = new Date(afec[0], (afec[1] - 1), afec[2]);
    var dia = f.getDate();
    var mes = f.getMonth() + 1;
    var anio = f.getFullYear();
    if (dia < 10) {
        dia = "0" + dia;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }
    return (dia + '/' + mes + '/' + anio);
}
function fechaG() {
    var f = new Date();
    var dia = f.getDate();
    var mes = f.getMonth() + 1;
    var anio = f.getFullYear();
    if (dia < 10) {
        dia = "0" + dia;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }
    return (anio + '-' + mes + '-' + dia);
}
function toFechaG(fec) {
    var afec = fec.split("/");
    var f = new Date(afec[2], (afec[1] - 1), afec[0]);
    var dia = f.getDate();
    var mes = f.getMonth() + 1;
    var anio = f.getFullYear();
    if (dia < 10) {
        dia = "0" + dia;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }
    return (anio + '-' + mes + '-' + dia);
}
function estoyEnUnIframe() {
    var insideIframe = window.top !== window.self;
    if (!insideIframe) {
        location.href = '../main.php';
    }
}
function logout() {
    $.ajax({
        type: 'POST',
        url: 'crl/usuarioCRL.php',
        data: {
            action: 'logout'
        },
        success: function () {
            location.href = "login.php";
        },
        error: function () {
            NewNotify('red', 'Error en el sistema', 'Por favor vuelva a intentralo', 3000, 'white');

        }
    });
}
function resizeModal(w, h) {
    $('#Modal').css('height', h + 'px');
    $('#Modal').css('width', w + 'px');
}
function openModal2(ventana) {
    var time = new Date().getTime();
    switch (ventana) {
        case 'Paciente':
            $('#modalTitulo').html('Registro de Pacientes');
            $('#modalIframe').attr('src', 'modulos/Paciente.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
            break;
        case 'Paciente2':
            $('#modalTitulo').html('Detalle de Pacientes');
            $('#modalIframe').attr('src', 'modulos/DetallePaciente.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
    }
}
function openModal(ventana) {
    var time = new Date().getTime();
    switch (ventana) {
        case 'Paciente':
            $('#modalTitulo').html('Registro de Pacientes');
            $('#modalIframe').attr('src', 'modulos/Paciente.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
            break;
        case 'micuenta':
            $('#modalTitulo').html('Mi Cuenta');
            $('#modalIframe').attr('src', 'modulos/micuenta.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
            break;
        case 'ListaPacientes':
            $('#modalTitulo').html('Lista de Pacientes');
            $('#modalIframe').attr('src', 'modulos/ListaPacientes.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
            break;
        case 'ListaPacientes2':
            $('#modalTitulo').html('Lista de Pacientes');
            $('#modalIframe').attr('src', 'modulos/ListaPacientes_1.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
            break;
        case 'module':
            $('#modalTitulo').html('');
            $('#modalIframe').attr('src', 'modulos/module.html');
            $('#Modal').css('height', '750px');
            $('#Modal').css('width', '1000px');
            break;
        case 'users':
            $('#modalTitulo').html('Mantenedor de Usuarios');
            $('#modalIframe').attr('src', 'modulos/users.html?time=' + time);
            $('#Modal').css('height', '465px');
            $('#Modal').css('width', '700px');
            break;
        case 'proveedores':
            $('#modalTitulo').html('Mantenedor de Proveedores');
            $('#modalIframe').attr('src', 'modulos/micuenta.html');
            $('#Modal').css('height', '580px');
            $('#Modal').css('width', '1000px');
            break;
        case 'monturas':
            $('#modalTitulo').html('Mantenedor de Monturas');
            $('#modalIframe').attr('src', 'modulos/monturas.html?time=' + time);
            $('#Modal').css('height', '370px');
            $('#Modal').css('width', '800px');
            break;
        case 'productos':
            $('#modalTitulo').html('Mantenedor de Productos');
            $('#modalIframe').attr('src', 'modulos/productos.html?time=' + time);
            $('#Modal').css('height', '430px');
            $('#Modal').css('width', '900px');
            break;
        case 'ingreso':
            $('#modalTitulo').html('Ingreso de Monturas');
            $('#modalIframe').attr('src', 'modulos/detalleingreso.html?time=' + time);
            $('#Modal').css('height', '580px');
            $('#Modal').css('width', '1000px');
            break;
        case 'ingresoProd':
            $('#modalTitulo').html('Ingreso de Productos');
            $('#modalIframe').attr('src', 'modulos/detalleingresoProd.html?time=' + time);
            $('#Modal').css('height', '580px');
            $('#Modal').css('width', '1000px');
            break;
        case 'tiendas':
            $('#modalTitulo').html('Mantenedor de Tiendas');
            $('#modalIframe').attr('src', 'modulos/tiendas.html?time=' + time);
            $('#Modal').css('height', '450px');
            $('#Modal').css('width', '600px');
            break;
//        case 'caracteristicas':
//            $('#modalTitulo').html('Mantenedor de Características');
//            $('#modalIframe').attr('src', 'modulos/caracteristicas.html?time=' + time);
//            $('#Modal').css('height', '490px');
//            $('#Modal').css('width', '700px');
//            break;
//        case 'productos':
//            $('#modalTitulo').html('Mantenedor de Productos');
//            $('#modalIframe').attr('src', 'modulos/productos.html?time=' + time);
//            $('#Modal').css('height', '375px');
//            $('#Modal').css('width', '850px');
//            break;
//
//        case 'ingreso':
//            $('#modalTitulo').html('Ingreso de Productos');
//            $('#modalIframe').attr('src', 'modulos/detalleingreso.html?time=' + time);
//            $('#Modal').css('height', '608px');
//            $('#Modal').css('width', '1300px');
//            break;

//        case 'baja':
//            $('#modalTitulo').html('Baja de productos');
//            $('#modalIframe').attr('src', 'modulos/bajaProductos.html?time=' + time);
//            $('#Modal').css('height', '485px');
//            $('#Modal').css('width', '1000px');
//            break;
        case 'inventario':
            $('#modalTitulo').html('Inventario de Almacen');
            $('#modalIframe').attr('src', 'modulos/inventario.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '660px');
            $('#Modal').css('width', '1140px');
            break;
        case 'inventarioT':
            $('#modalTitulo').html('Inventario de Tienda');
            $('#modalIframe').attr('src', 'modulos/inventario.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '660px');
            $('#Modal').css('width', '1140px');
            break;
        case 'inventarioP':
            $('#modalTitulo').html('Inventario de Productos');
            $('#modalIframe').attr('src', 'modulos/inventarioProd.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '580px');
            $('#Modal').css('width', '1000px');
            break;
        case 'inventarioPT':
            $('#modalTitulo').html('Inventario de Productos');
            $('#modalIframe').attr('src', 'modulos/inventarioProd.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '580px');
            $('#Modal').css('width', '1000px');
            break;
        case 'movimientoProd':
            $('#modalTitulo').html('Envio de Productos');
            $('#modalIframe').attr('src', 'modulos/movimientoP.html?time=' + time);
            $('#Modal').css('height', '635px');
            $('#Modal').css('width', '800px');
            break;
        case 'movimiento':
            $('#modalTitulo').html('Envios de Monturas');
            $('#modalIframe').attr('src', 'modulos/movimiento.html?time=' + time);
            $('#Modal').css('height', '635px');
            $('#Modal').css('width', '800px');
            break;
        case 'Ringreso':
            $('#modalTitulo').html('Reporte de ingresos a almacen');
            $('#modalIframe').attr('src', 'modulos/ingreso.html?time=' + time);
            $('#Modal').css('height', '608px');
            $('#Modal').css('width', '1300px');
            break;
        case 'alta':
            $('#modalTitulo').html('Alta de Monturas');
            $('#modalIframe').attr('src', 'modulos/movimiento.html?alta=true&ti=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '640px');
            $('#Modal').css('width', '1000px');
            break;
        case 'altaP':
            $('#modalTitulo').html('Alta de Productos');
            $('#modalIframe').attr('src', 'modulos/movimientoP.html?alta=true&ti=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '640px');
            $('#Modal').css('width', '1000px');
            break;
        case 'inter':
            $('#modalTitulo').html('Busqueda de Monturas');
            $('#modalIframe').attr('src', 'modulos/intertienda.html?time=' + time);
            $('#Modal').css('height', '495px');
            $('#Modal').css('width', '1020px');
            break;
        case 'anular':
            $('#modalTitulo').html('Anular Venta');
            $('#modalIframe').attr('src', 'modulos/anular.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '310px');
            $('#Modal').css('width', '520px');
            break;
        case 'masivo':
            $('#modalTitulo').html('Modificador de Bloques');
            $('#modalIframe').attr('src', 'modulos/masivo.html?time=' + time);
            $('#Modal').css('height', '310px');
            $('#Modal').css('width', '520px');
            break;
        case 'dia':
            $('#modalTitulo').html('Reporte Diario de Caja');
            $('#modalIframe').attr('src', 'modulos/dia.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '635px');
            $('#Modal').css('width', '1225px');
            break;
        case 'ventac':
            $('#modalTitulo').html('Punto de Venta');
            $('#modalIframe').attr('src', 'modulos/ventas.html?time=' + time);
            //$('#Modal').css('height', '665px');
            $('#Modal').css('height', '590px');
            $('#Modal').css('width', '1155px');
            break;
        case 'medicion':
            $('#modalTitulo').html('Módulo medición');
            $('#modalIframe').attr('src', 'modulos/medicion.html?time=' + time);
            //$('#Modal').css('height', '665px');
            $('#Modal').css('height', '595px');
            $('#Modal').css('width', '800px');
            break;
        case 'historial':
            $('#modalTitulo').html('Historial de Medición');
            $('#modalIframe').attr('src', 'modulos/historial.html?time=' + time);
            $('#Modal').css('height', '595px');
            $('#Modal').css('width', '800px');
            break;
//        case 'stock':
//            $('#modalTitulo').html('Stock Minimo');
//            $('#modalIframe').attr('src', 'modulos/stockmin.html?t=al&time=' + time);
//            $('#Modal').css('height', '565px');
//            $('#Modal').css('width', '762px');
//            break;
//        case 'stockT':
//            $('#modalTitulo').html('Stock Minimo');
//            $('#modalIframe').attr('src', 'modulos/stockmin.html?t=td&time=' + time);
//            $('#Modal').css('height', '565px');
//            $('#Modal').css('width', '762px');
//            break;
//        case 'conceciones':
//            $('#modalTitulo').html('Concesiones');
//            $('#modalIframe').attr('src', 'modulos/conceciones.html?time=' + time);
//            $('#Modal').css('height', '650px');
//            $('#Modal').css('width', '1000px');
//            break;
        case 'buscarVenta':
            $('#modalTitulo').html('Buscar por codigo');
            $('#modalIframe').attr('src', 'modulos/buscarVenta.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '150px');
            $('#Modal').css('width', '280px');
            break;
        case 'ri':
            $('#modalTitulo').html('Reporte de Ventas');
            $('#modalIframe').attr('src', 'modulos/reporteIngresos.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '650px');
            $('#Modal').css('width', 'calc(90% - 38px)');
            break;
        case 'rc':
            $('#modalTitulo').html('Reporte por Comprobante');
            $('#modalIframe').attr('src', 'modulos/reporteComprobantes.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '650px');
            $('#Modal').css('width', 'calc(90% - 38px)');
            break;
        case 'rbet':
            $('#modalTitulo').html('Reporte de Ingresos Por Boleta');
            $('#modalIframe').attr('src', 'modulos/reporteXBoleta.html?t=' + tiendaUser + '&time=' + time);
            $('#Modal').css('height', '650px');
            $('#Modal').css('width', 'calc(90% - 38px)');
            break;
    }
    $('#Mask').fadeToggle('slow');
    setTimeout(function () {
        $('#Modal').fadeToggle('slow');
    }, 200);
}
function formatoTabla(width) {
    $('.datatable tr td').css('width', width);
    $('.idCol').css('width', ('30px'));
    $('.idColS').css('width', ('45px'));
    $('.ColXX').css('width', ('250px'));
    $('.ColMM').css('width', ('50px'));
    $('.ColMMM').css('width', ('65px'));
    $('.ColMS').css('width', ('30px'));
    $('.ColXXS').css('width', ('300px'));
    $('.ColXXX').css('width', ('350px'));
    $('.ColXXXX').css('width', ('430px'));
    $('.ColXXXXM').css('width', ('482px'));
    $('.ColXXXMM').css('width', ('460px'));
    $('.ColXXXXX').css('width', ('630px'));
    $('.ColWC').css('width', ('50px'));
    $('.ColWP').css('width', ('75px'));
    $('.ColWI').css('width', ('75px'));
    $('.ColWA').css('width', ('30px'));
    $('.ColM').css('width', ('160px'));
    $('.ColSM').css('width', ('87px'));
    $('.ColXS').css('width', ('20px'));
    $('.ColFS').css('width', ('90px'));
    $('.ColOH').css('width', ('100px'));
    $('.ColOH2').css('width', ('110px'));
    $('.ColMA').css('width', ('200px'));
    //$('.ColXXXXMM').css('width', ('567'));
}
function closeModal() {

    $('#Modal').fadeToggle('slow');
    $('#modalIframe').attr('src', '');
    setTimeout(function () {
        $('#Mask').fadeToggle('slow');
    }, 200);
}
function msgError(mensaje, color) {
    $('.msg').html(mensaje);
    $('.msg').css("background", color);
    //$('.msg').css("display", "block");
    $('.msg').fadeIn(100);
    setTimeout(function () {
        //$('.msg').css("display", "none");
        $('.msg').fadeOut(400);
    }, 2000);
}
function toDouble(num) {
    var out = (parseFloat(num)).toFixed(2);
    return out;
}
function toInt(num) {
    var patron = /^\d*$/;
    if (patron.test(num)) {
        return parseInt(num);
    } else {
        return '0';
    }
}
function cargando() {
    $(".preload").css("display", "none");
    $(".preload-img").css("display", "none");
}
String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
};
function changeTitle(text) {
    $('#modalTitulo').html(text);
}