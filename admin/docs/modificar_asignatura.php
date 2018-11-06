<?php include_once "menu.php";
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Asignatura</h1>
            <p>Asignatura</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="listar_roles.php">Asignatura</a></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Modificar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title">Modificar Asignaturas</div>
                <div class="tile-body">
                    <form action="../../enrutador/enr_asignatura.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombreasignatura">Nombre:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nombreasignatura" id="nombreasignatura" value="<?php echo $_GET['nombreasignatura'];?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nivel">Nivel:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nivel" id="nivel" value="<?php echo $_GET['nivel'];?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="descripcionasig">Descripcion:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="descripcionasig" id="descripcionasig" value="<?php echo $_GET['descripcionasig'];?>"></div>
                        </div>

                         <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" hidden for="id_asignatura">Id asignatura:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" hidden name="id_asignatura" id="id_asignatura" value="<?php echo $_GET['id_asignatura'];?>"></div>
                        </div>
                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-outline-success" type="submit" name="modificar">Modificar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="listar_asignatura.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>