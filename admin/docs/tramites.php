<?php include_once/** @lang text */
("menu.php");
include_once ('../../modelo/mdl_requisito.php');
$ob=new mdl_requisito();
$dato=$ob->listar_requisito();
$pasos=$ob->listar_paso();

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Tramite</h1>
            <p>Registro tramites</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        </ul>
    </div>
    <div class="col-md-12">
        <!-- Modal requisito -->
        <div class="modal fade" id="requi" tabindex="-1" role="dialog" aria-labelledby="requi" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Requisito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../../enrutador/enr_requisito.php"  method="post">
                    <div class="modal-body">

                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="requisito" class="col-form-label text-md-right">Nombre Requisito</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="requisito" name="requisito" type="text" class="form-control" value="" >
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="insertar" >Agregar</button>
                        <button type="button" class="btn btn-floating" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- fin modal requisito-->
        <!-- Modal paso -->
        <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="pass" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Paso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../../enrutador/enr_pasoplantilla.php"  method="post">
                    <div class="modal-body">

                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="nombrepasoplantilla" class="col-form-label text-md-right">Nombre del Paso</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="nombrepasoplantilla" name="nombrepasoplantilla" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="numeropasoplantilla" class="col-form-label text-md-right">Numero De Paso</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="numeropasoplantilla" name="numeropasoplantilla" type="number" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="duracion" class="col-form-label text-md-right">Duracion &nbsp;<sub><i>En Dias</i></sub></label>
                                </div>
                                <div class="col-md-6">
                                    <input id="duracion" name="duracion" type="number" class="form-control" required >
                                </div>
                            </div>

                    </div>
                        <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="insertarpaso" >Agregar</button>
                                    <button type="button" class="btn btn-flat" data-dismiss="modal">Cancelar</button>
                            </div>
                    </form>
                        </div>
            </div>
                </div>
            </div>
        <!-- fin modal paso-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Tramites</h3></center>
                    </div>
                    <form action="../../enrutador/enr_tramite.php" method="post">
                    <div class="card-body">

                            <div class="form-group row">
                                <div class="col-md-2"><label class="col-form-label text-md-right" for="nombre">Nombre</label></div>
                                <div class="col-md-4"><input class="form-control" type="text" required name="nombre" id="nombre" placeholder="Nombre del Tramite"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"><label class="col-form-label text-md-right" for="req">Requisito</label></div>
                                <div class="col-md-4"><select id="req" class="selectpicker" required name="req[]"  multiple data-live-search="true">
                                        <?php
                                        while($row=mysqli_fetch_assoc($dato)){
                                            echo "<option>".$row['nombrerequisitoplatilla']."</option>";
                                        }?>
                                    </select></div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary col-md-4" data-toggle="modal" data-target="#requi">Agregar Nuevo Requisito</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"><label class="col-form-label text-md-right" for="pas">Pasos</label></div>
                                <div class="col-md-4"><select required id="pas" class="selectpicker" name="pas[]"  multiple data-live-search="true">
                                        <?php
                                        while($p=mysqli_fetch_assoc($pasos)){
                                            echo "<option>".$p['nombrepasoplantilla']."</option>";
                                        }?>
                                    </select></div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary col-md-4" data-toggle="modal" data-target="#pass">Agregar Nuevo Paso</button>
                                </div>
                            </div>


                    </div>
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <button class="btn btn-success" type="submit" name="action">Finalizar
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-get-started" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
