<?php
    include_once "menu.php";
    include_once ('../../modelo/conexion.php');
    $obj=new conexion();
    $id_persona=$_GET['id_persona'];
    $sql= "select * from persona where id_persona=$id_persona;";
    $datos_persona=$obj->con_retorno($sql);
    while ($row=mysqli_fetch_assoc($datos_persona)){
        $nombre=$row['nombre'];
        $papellido=$row['papellido'];
        $sapellido=$row['sapellido'];
        $ci=$row['ci'];
        $dirreccion=$row['direccion'];
        $telefono=$row['telefono'];
        $email=$row['email'];
    }
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Persona</h1>
            <p>Modificación de Persona</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="#">Listar Persona</a></li>
            <li class="breadcrumb-item active"><a href="#">Modificar Persona</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="tile">
                <center>
                    <div class="tile-title">Modificar Persona</div>
                </center>
                <div class="tile-body">
                    <form action="../../enrutador/enr_agregarusuario.php" method="post" autocomplete="off" required>
                        <hr>
                        <div class="form-group row" hidden>
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="id_persona">ID Persona:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="id_persona" id="id_persona" value="<?php echo $id_persona;?>"></div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="nombre">Nombre:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="papellido">Apellido Paterno:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="papellido" id="papellido" value="<?php echo $papellido;?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="sapellido">Apellido Materno:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="sapellido" id="sapellido" value="<?php echo $sapellido;?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="ci">C.I:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="ci" id="ci" value="<?php echo $ci;?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="telefono">Telefono:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="telefono" id="telefono" value="<?php echo $telefono;?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="direccion">Dirección:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $dirreccion;?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"><label class="col-form-label text-md-right" for="email">Email:</label></div>
                            <div class="col-md-5"><input class="form-control" type="text" name="email" id="email" value="<?php echo $email;?>"></div>
                        </div>
                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-success" type="submit" name="modificar">Modificar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="table-personas.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>