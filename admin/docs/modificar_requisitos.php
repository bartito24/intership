<?php include_once "menu.php";
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Requisitos</h1>
            <p>Modificacion de Requisitos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="vst_rol1.php">Modificar Requisitos</a></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Modificar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="tile">
               <center> <div class="tile-title" style=" font-family: Georgia, 'Times New Roman', serif;"><b>Modificacion de Requisitos</b></div></center>
                <div class="tile-body">
                    <form action="../../enrutador/enr_requisito.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombrerequsito">Nombre Requisito</label></div>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nombrerequisito" id="nombrerequsito" value="<?php echo $_GET['nombrerequisito'];?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" hidden for="id_carrera">id carrera</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" hidden name="id_requisitos" id="id_carrera" value="<?php echo $_GET['id_requisitos'];?>"></div>
                        </div>


                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-success" type="submit" name="modificar">Modificar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="listar_requisito.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>