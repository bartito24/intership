<?php
include_once "menu.php";
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Requisitos</h1>
            <p>Creacion de Requisitos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Crear Requisitos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title">Creacion de Requisitos</div>
                <div class="tile-body">
                </div>
                <div>
                    <form action="../../enrutador/enr_requisito.php"  method="post">
                        <div class="form-group row ">
                            <div class="col-md-3">
                                <label for="requisito" class="col-form-label text-md-right">Requisito</label>
                            </div>
                            <div class="col-md-6">
                                <input id="requisito" name="requisito" type="text" class="form-control" value="" >
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary" name="insertar" >Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>











