<?php include_once('menu.php');
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Requisitos</h1>
            <p>Registro Requisitos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Requisitos</li>
            <li class="breadcrumb-item"><a href="#">Crear Requisitos</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Nueva Requisitos</h3></center>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_requisito.php" method="post" autocomplete="off" required>
                            <div class="form-group row">
                                <label for="nombrerequisito" class="col-md-4 col-form-label text-md-right">Nombre Requisito:</label>
                                <div class="col-md-6">
                                    <input type="text" name="nombrerequisito" id="nombrerequisito" class="form-control" value="" required autofocus onkeypress="return letras(event);">
                                </div>
                            </div>

                            <div class="form-group row" style="text-align:center"><div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary" name="insertar">
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
        </div>
    </div>

</main>
