<?php
include_once('menu.php');
include_once ('../../modelo/conexion.php');


    ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Cuadernillo</h1>
            <p>Registro Cuadernillo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Cuadernillo</li>
            <li class="breadcrumb-item"><a href="#">Registro Cuadernillo</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="tile">
                        <center><h3 class="tile-title">Cuadernillo</h3></center>
                        <div class="tile-body">
                            <form name="f1" action="../../enrutador/enr_estudio.php" method="post" autocomplete="off" required>
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="" maxlength="12" required autofocus onkeypress="return sololetras(event);">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="" maxlength="12" required autofocus onkeypress="return sololetras(event);">
                                    </div>
                                </div>




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
            </div>
        </div>
    </div>

</main>
