<?php 
include_once ('../../modelo/conexion.php');
$con=new conexion();
$sql="select * from asignatura where activoasignatura=1";
$datos=$con->con_retorno($sql);
$sql1="select * from requisitos where activorequisito=1";
$requisito=$con->con_retorno($sql1);
 include_once('menu.php');
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Asignaturas</h1>
            <p>Registro Asignaturas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Asignaturas</li>
            <li class="breadcrumb-item"><a href="#">Registro Asignaturas</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Nueva Asignaturas</h3></center>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/agregar_asignatura.php" method="post" autocomplete="off" required>
                            <div class="form-group row">
                                <label for="nombreasignatura" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                <div class="col-md-6">
                                    <input type="text" name="nombreasignatura" id="nombreasignatura" class="form-control" value="pasantia" readonly autofocus onkeypress="return letras(event);">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcionasig" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                                <div class="col-md-6">
                                    <input type="text" name="descripcionasig" id="descripcionasig" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nivel" class="col-md-4 col-form-label text-md-right">Nivel:</label>
                                <div class="col-md-6">
                                    <input type="number" name="nivel" id="nivel" class="form-control" value="" required min="1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="req" class="col-md-4 col-form-label text-md-right">Requisito:</label>
                                <div class="col-md-6"><select id="req" class="selectpicker" required name="req[]" multiple data-live-search="true">
                                        <?php
                                        while($row2=mysqli_fetch_assoc($requisito)){
                                            echo "<option>".$row2['nombrerequsito']."</option>";
                                        }?>
                                    </select></div>
                            </div>

                            <div class="form-group row" style="text-align:center"><div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary" name="registrar">
                                        <span class="glyphicon glyphicon-log-in"></span> Registrar
                                    </button>
                                </div>
                                <div class ="col-md-4"><button type="reset" class="btn btn-dark">
                                        <span class="glyphicon glyphicon-pencil"></span>Limpiar
                                    </button></div>
                                <div class ="col-md-4"><a class="btn btn-danger" href="menu.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Asiganturas Creadas</h3></center>
                    <div class="tile-body">
                        <?php 
                        while ($row=mysqli_fetch_assoc($datos)) {
                            echo "<div class='form-group row'>
                            <div class='col-md-12'>
                                <button class='btn btn-danger col-md-12'>$row[nombreasignatura]</button>
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
