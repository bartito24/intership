<?php
include_once ('menu.php');
?>
<main class="app-content">
    <?php
    if($_SESSION['bienvenida']==0){
        echo "<script>
iziToast.success({
 position: 'topRight',
    title: 'Inicio:',
    message: 'Bienvenido al Sistema',
});
</script>";
        $_SESSION['bienvenida']=1;
    }
    ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i>Pagina Principal</h1>
            <p>Pagina Principal</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="#">Pagina Principal
                </a></li>
        </ul>
    </div>
    <div class="tile">
        <img src="../../logo/apple-icon.png" width="120" height="130" style="float:left; margin:10px;">
        <center>
            <b><h1 style="font-family:'Niconne'; font-size: 70px;">Bienvenido al Sistema Internship</h1> </b>
        </center>
        <p>
            Es un sistema de gestión de pasantías para controlar y facilitar las pasantías que se llevan a cabo en el área de registros, de modo que el cliente pueda verificar el estado de las pasantías desde su móvil o pc.
        </p>

        <hr align="left" color="#962439" size="2" />
        <center>
            <img src="../../imagenes/plane-loader-slower.gif" width="470" height="300">
        </center>
        <hr color="#962439">
        <center>
            <div>
                <h2 style="font-family:'Niconne';">Agradecimientos</h2>
                <p>
                    Queremos agradecer a todos los Ingenieros por la enseñanza y el tiempo.
                </p>
                <?php
                $fecha_actual = date("Y-m-d");
                //sumo 1 semana
                echo date("Y-m-d",strtotime($fecha_actual."+ 1 week"));
                ?>
            </div>
        </center>
    </div>
</main>