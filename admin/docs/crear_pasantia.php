<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pasantía</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../../js/validacion.js"></script>
    <?php include_once('menu.php');
    include_once ('../../modelo/conexion.php');
    $obj=new conexion();
    $sql= "select * from asignatura where activoasignatura=1";
    $sql2="select * from empresa where activoempresa=1";
    $sql3="select * from estudiante join persona p on estudiante.persona_id_persona = p.id_persona where activoestudiante=1";
    $sql4="select * from empleado join persona p on empleado.persona_id_persona = p.id_persona where cargo='Tutor' || cargo='Jefe de Carrera' and activoempleado=1 and activo=1";
    $datos_asignatura=$obj->con_retorno($sql);
    $datos_empresa=$obj->con_retorno($sql2);
    $datos_estudiante=$obj->con_retorno($sql3);
    $datos_empleado=$obj->con_retorno($sql4);
    $ao = date("Y" );
    ?>
</head>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Pasantias</h1>
            <p>Registro de Pasantías</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Pasantía</li>
            <li class="breadcrumb-item"><a href="#">Registro de Pasantías</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-7">
                <div class="tile">
                    <center><h3 class="tile-title">Crear Nueva Pasantía</h3></center>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_pasantia.php" method="post" autocomplete="off" required>
                            <div class="form-group row"><label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa:</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="empresa">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row=mysqli_fetch_assoc($datos_empresa)){
                                            echo "<option value='$row[id_empresa]'>".$row['nombreempresa']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label for="areas" class="col-md-4 col-form-label text-md-right">Area:</label><div class="col-md-6"><input type="text" name="area" id="area" class="form-control" value="" required autofocus onkeypress="return sololetras(event);"></div></div>
                            <div class="form-group row"><label for="funciones" class="col-md-4 col-form-label text-md-right">Descripción:</label><div class="col-md-6">
                                    <textarea name="funciones" id="funciones" cols="36" rows="4" onkeypress="return sololetras(event)"></textarea></div></div>
                            <div class="form-group row"><label for="asignatura" class="col-md-4 col-form-label text-md-right">Asignatura:</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="asignatura">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row2=mysqli_fetch_assoc($datos_asignatura)){
                                            echo "<option value='$row2[id_asignatura]'>".$row2['nombreasignatura']." ".$row2['nivel']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label for="estudiante" class="col-md-4 col-form-label text-md-right">Estudiante:</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="estudiante">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row3=mysqli_fetch_assoc($datos_estudiante)){
                                            echo "<option value='$row3[id_estudiante]'>".$row3['nombre']." ".$row3['papellido']." ".$row3['sapellido']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label for="empleado" class="col-md-4 col-form-label text-md-right">Empleado:</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="empleado">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row4=mysqli_fetch_assoc($datos_empleado)){
                                            echo "<option value='$row4[id_empleado]'>".$row4['nombre']." ".$row4['papellido']." ".$row4['sapellido']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label for="fechainicio" class="col-md-4 col-form-label text-md-right">Fecha Inicio:</label><div class="col-md-6"><input type="date" name="fechainicio" id="fechainicio" class="form-control" value="" required autofocus></div></div>
                            <div class="form-group row"><label for="gestion" class="col-md-4 col-form-label text-md-right">Gestion:</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="gestion">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <option VALUE="1">Gestion 1 de <?php echo $ao ?></option>
                                        <option VALUE="2">Gestion 2 de <?php echo $ao ?></option>
                                        <option VALUE="3">Gestion Anualizado de <?php echo $ao ?></option>
                                    </select>
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
                                <div class ="col-md-4"><a class="btn btn-danger" href="listar_pasantia.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
