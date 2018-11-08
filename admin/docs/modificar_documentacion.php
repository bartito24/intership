<?php include_once "menu.php";
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Estudia</h1>
            <p>Modificación de Documentacion</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="listar_roles.php">Modificar Documentacion</a></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Modificar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title">Modificacion de Documentacion</div>
                <div class="tile-body">
                    <form action="../../enrutador/enr_documentacion.php" method="post">

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombredoc">Nombre</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nombredoc" id="nombredoc" value="<?php echo $_GET['nombredoc'];?>"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="fechaentrega">Fecha Entrega</label></div>
                            <div class="col-md-10"><input class="form-control" type="date" name="fechaentrega" id="fechaentrega" disabled value="<?php echo $_GET['fechaentrega'];?>"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="respaldo">Respaldo</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="respaldo" id="respaldo" value="<?php echo $_GET['respaldo'];?>"></div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" hidden for="id_documentacion">id documentacion</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" hidden name="id_documentacion" id="id_documentacion" value="<?php echo $_GET['id_documentacion'];?>"></div>
                        </div>
                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-success" type="submit" name="modificar">Modificar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="listar_documentacion.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>