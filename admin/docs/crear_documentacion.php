<?php 
include_once ('../../modelo/conexion.php');
$con=new conexion();
$sql="select * from documentacion";
$datos=$con->con_retorno($sql);

 ?>

<html>
<head>
    <meta charset="UTF-8">
     <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentacion</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../../js/validacion.js"></script>
    <?php include_once('menu.php');
    include_once ('../../modelo/conexion.php');
    $obj=new conexion();
    $sql= "select * from documentacion ";
    $datos_documentacion=$obj->con_retorno($sql);
    ?>
</head>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Documentacion</h1>
            <p>Registro De Documentacion</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Documentacion</li>
            <li class="breadcrumb-item"><a href="#">Registro de Documentacion</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Nuevo Documento</h3></center>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_documentacion.php" method="post" autocomplete="off" required>
                            <div class="form-group row"><label for="nombredoc" class="col-md-4 col-form-label text-md-right">Nombre:</label><div class="col-md-6"><input type="text" name="nombredoc" id="nombredoc" class="form-control" value="" required autofocus onkeypress="return sololetras(event);"></div></div>
                            <div class="form-group row"><label for="fechaentrega" class="col-md-4 col-form-label text-md-right">Fecha Entrega:</label><div class="col-md-6"><input type="date" name="fechaentrega" id="fechaentrega" class="form-control" value="" required></div></div>
                            <div class="form-group row"><label for="respaldo" class="col-md-4 col-form-label text-md-right">Respaldo:</label><div class="col-md-6"><input type="text" name="respaldo" id="respaldo" class="form-control" value="" required autofocus onkeypress="return sololetras(event);"></div></div>
                            

                              


                           
                            <div class="form-group row" style="text-align:center"><div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary" name="registrar">
                                        <span class="glyphicon glyphicon-log-in"></span> Registrar
                                    </button>
                                </div>
                                <div class ="col-md-4"><button type="reset" class="btn btn-dark">
                                        <span class="glyphicon glyphicon-pencil"></span>Limpiar
                                    </button></div>
                                <div class ="col-md-4"><a class="btn btn-danger" href="listar_empresa.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>



                </div>
            </div>

            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Documentacion Disponibles</h3></center>
                    <div class="tile-body">
                        <?php
                        while ($row=mysqli_fetch_assoc($datos)) {
                            echo "<div class='form-group row'>
                            <div class='col-md-12'>
                            
                            <center> <p class='form-control'>$row[nombredoc]</p></center>

                                
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
</body>
</html>
