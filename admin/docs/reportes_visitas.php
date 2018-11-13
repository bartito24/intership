<?php
include_once ('../../modelo/conexion.php');
$con=new conexion();
$sql="select * from empleado join persona p on empleado.persona_id_persona = p.id_persona where activo=1 and cargo='Tutor' or cargo='Jefe de carrera'";
$datos_empleado=$con->con_retorno($sql);

$sql2="select * from asignatura where activoasignatura=1";
$datos_asignatura=$con->con_retorno($sql2);
 ?>
<head>
    <meta charset="UTF-8">
     <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../../js/validacion.js"></script>
    <?php
        include_once('menu.php');
    ?>
</head>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Reportes</h1>
            <p>Reportes de Asignaturas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Reportes</li>
            <li class="breadcrumb-item"><a href="#">Reportes Asignaturas</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Generar Reporte por Asignaturas</h3></center>
                    <hr>
                    <div class="tile-body">
                        <form name="f1" action="conexion/rep_visitas.php" method="post" autocomplete="off" required>
                            <div class="form-group row"><label for="empresa" class="col-md-3 col-form-label text-md-right">Asignaturas:</label>
                                <div class="col-md-7">
                                    <select class="custom-select" name="asignaturas" required>
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row=mysqli_fetch_assoc($datos_asignatura)){
                                            echo "<option value='$row[id_asignatura]' style='text-transform: capitalize'>".$row['nombreasignatura']." ".$row['nivel']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row" style="text-align:center"><div class="col-md-6">
                                    <button type="submit" class="btn btn-outline-primary" name="generar">
                                        <span class="glyphicon glyphicon-log-in"></span> Generar
                                    </button>
                                </div>
                                <div class ="col-md-4"><a class="btn btn-danger" href="index.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

