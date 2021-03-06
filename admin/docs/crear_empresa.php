<?php 
include_once ('../../modelo/conexion.php');
$con=new conexion();
$sql="select * from empresa where activoempresa=1";
$datos=$con->con_retorno($sql);


 ?>
<head>
    <meta charset="UTF-8">
     <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../../js/validacion.js"></script>
    <?php include_once('menu.php');
    include_once ('../../modelo/conexion.php');
    $obj=new conexion();
    $sql= "select * from empleado where activoempleado=1";
    $datos_empresa=$obj->con_retorno($sql);
    ?>
</head>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Empresa</h1>
            <p>Registro Empresas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Empresas</li>
            <li class="breadcrumb-item"><a href="#">Registro Empresa</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Nueva Empresa</h3></center>
                    <hr>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_empresa.php" method="post" autocomplete="off" required>
                            <div class="form-group row"><label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label><div class="col-md-6"><input type="text" name="nombre" id="nombre" class="form-control" value="" required autofocus onkeypress="return sololetras(event);" maxlength="16"></div></div>
                            <div class="form-group row"><label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion:</label><div class="col-md-6"><input type="text" name="direccion" id="direccion" class="form-control" value="" required maxlength="30" onkeypress="return dirreccion(event);"></div></div>
                            <div class="form-group row"><label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono:</label><div class="col-md-6"><input type="text" name="telefono" id="telefono" class="form-control" value="" required autofocus maxlength="12" onkeypress="return solonumeros(event);"></div></div>
                            <div class="form-group row"><label for="nombrerep" class="col-md-4 col-form-label text-md-right">Nombre Responsable:</label><div class="col-md-6"><input type="text" name="nombrerep" id="nombrerep" class="form-control" value="" maxlength="11" required autofocus onkeypress="return sololetras(event);"></div></div>

                            <div class="form-group row"><label for="apellidorep" class="col-md-4 col-form-label text-md-right">Apellidos:</label><div class="col-md-6"><input type="text" name="apellidorep" id="apellidorep" class="form-control" value="" maxlength="12" required autofocus onkeypress="return sololetras(event);"></div></div>

                            <div class="form-group row"><label for="celular" class="col-md-4 col-form-label text-md-right">Celular:</label><div class="col-md-6"><input type="text" name="celular" id="celular" class="form-control" value="" required autofocus maxlength="12" onkeypress="return solonumeros(event);"></div></div>
                            <hr>
                            <div class="form-group row" style="text-align:center"><div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary" name="registrar">
                                        <span class="glyphicon glyphicon-log-in"></span> Registrar
                                    </button>
                                </div>
                                <div class ="col-md-4"><button type="reset" class="btn btn-dark">
                                        <span class="glyphicon glyphicon-pencil"></span>Limpiar
                                    </button></div>
                                <div class ="col-md-4"><a class="btn btn-danger" href="index.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Empresas Disponibles</h3></center>
                    <hr>
                    <div class="tile-body">
                        <?php 
                        while ($row=mysqli_fetch_assoc($datos)) {
                            echo "<div class='form-group row'>
                            <div class='col-md-12'>
                            
                                <center><p class='form-control'>$row[nombreempresa]</p></center>

                                
                            </div>
                                
                            </div>";
                        }

                         ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

