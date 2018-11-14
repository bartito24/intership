
    <?php
    include_once ('../../modelo/conexion.php');
    include_once("menu.php");
    $ob=new conexion();
    $id_pasantia=$_GET['id_pasantia'];
    $sql="select * from pasantia where id_pasantia=$id_pasantia;";
    $datos_pasantia=$ob->con_retorno($sql);
    while ($row=mysqli_fetch_assoc($datos_pasantia))
    {
        $estado=$row['estadopasantia'];
        $notatutor=$row['notatutor'];
        $notasupervisor=$row['notasupervisor'];
        $notafinal=$row['notafinal'];
    }
    ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Notas</h1>
            <p>Registro de Notas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Notas</li>
            <li class="breadcrumb-item"><a href="#">Registro de Notas</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Subir Nota</h3></center>
                    <hr>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_nota.php" method="post" autocomplete="off" required>
                            <div class="form-group row" hidden><label for="id_pasantia" class="col-md-4 col-form-label text-md-right">Id Pasantia:</label><div class="col-md-6"><input type="tel" name="id_pasantia" id="id_pasantia" class="form-control" value="<?php echo $id_pasantia?>" min="1" max="100" maxlength="2" required autofocus></div></div>

                            <div class="form-group row"><label for="notasupervisor" class="col-md-4 col-form-label text-md-right">Nota Supervisor:</label><div class="col-md-6"><input type="tel" name="notasupervisor" id="notasupervisor" class="form-control" value="<?php echo $notasupervisor?>" min="1" max="100" maxlength="2" required autofocus onkeypress="return solonumeros(event);"></div></div>

                            <div class="form-group row"><label for="notatutor" class="col-md-4 col-form-label text-md-right">Nota Tutor:</label><div class="col-md-6"><input type="tel" name="notatutor" id="notatutor" class="form-control" value="<?php echo $notatutor?>" min="1" max="100" maxlength="2" required autofocus onkeypress="return solonumeros(event);"></div></div>
                            <div class="form-group row"><label for="notafinal" class="col-md-4 col-form-label text-md-right">Nota Final:</label><div class="col-md-6"><input type="tel" name="notafinal" id="notafinal" class="form-control" readonly value="<?php echo $notafinal?>" min="1" max="100" maxlength="2" required autofocus onkeypress="return solonumeros(event);"></div></div>
                            <hr>
                            <div class="form-group row" style="text-align:center"><div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-success" name="modificar">
                                        <span class="glyphicon glyphicon-log-in"></span> Modificar
                                    </button>
                                </div>
                                <?php
                                    echo "<div class ='col-md-4'><a class='btn btn-danger' href='../../enrutador/enr_nota.php?id_pasantia=".$id_pasantia."'>Eliminar</a></div>";
                                ?>
                                <div class ="col-md-4"><a class="btn btn-dark" href="listar_pasantia.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

