<?php include_once "menu.php";
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Empresas</h1>
            <p>Modificacion de Empresa</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="listar_roles.php">Modificar Empresa</a></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Modificar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title">Modificacion de Empresa</div>
                <div class="tile-body">
                    <form action="../../enrutador/enr_empresa.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombre">Nombre:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $_GET['nombre'];?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="direccion">Direccion:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $_GET['direccion'];?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="telefono">Telefono:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="telefono" id="telefono" value="<?php echo $_GET['telefono'];?>"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="area">Area:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="area" id="area" value="<?php echo $_GET['area'];?>"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="funciones">Funciones:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="funciones" id="funciones" value="<?php echo $_GET['funciones'];?>"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombresupervisor">Nombre Supervisor:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nombresupervisor" id="nombresupervisor" value="<?php echo $_GET['nombresupervisor'];?>"></div>
                        </div>

                       

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="correosupervisor">Correo Supervisor:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="correosupervisor" id="correosupervisor" value="<?php echo $_GET['correosupervisor'];?>"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" hidden for="id_empresa">Id empresa:</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" hidden name="id_empresa" id="id_empresa" value="<?php echo $_GET['id_empresa'];?>"></div>
                        </div>
                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-outline-success" type="submit" name="modificar">Modificar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="listar_empresa.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>