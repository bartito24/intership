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
    $sql= "select * from empleado where activoempleado=1";
    $sql2="select * from empresa where activoempresa=1";
    $datos_empleado=$obj->con_retorno($sql);
    $datos_empresa=$obj->con_retorno($sql2);
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
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Crear Nueva Pasantía</h3></center>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_pasantia.php" method="post" autocomplete="off" required>
                            <div class="form-group row"><label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa:</label>
                                <div class="col-md-6">
                                    <select class="custom-select">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row2=mysqli_fetch_assoc($datos_empresa)){
                                            echo "<option value='$row2[id_empresa]'>".$row2['nombreempresa']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label for="area" class="col-md-4 col-form-label text-md-right">Area:</label><div class="col-md-6"><input type="text" name="area" id="area" class="form-control" value="" required autofocus onkeypress="return sololetras(event);"></div></div>
                            <div class="form-group row"><label for="area" class="col-md-4 col-form-label text-md-right">Descripción:</label><div class="col-md-6">
                                    <textarea name="funciones" id="funciones" cols="30" rows="4"></textarea></div></div>
                            <div class="form-group row"><label for="numpasantia" class="col-md-4 col-form-label text-md-right">Numero de Pasantía:</label>
                                <div class="col-md-6">
                                    <select class="custom-select">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <option value="1">Pasantía 1</option>
                                        <option value="2">Pasantía 2</option>
                                        <option value="3">Pasantía 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label for="fechainicio" class="col-md-4 col-form-label text-md-right">Fecha Inicio:</label><div class="col-md-6"><input type="date" name="fechainicio" id="fechainicio" class="form-control" value="" required autofocus></div></div>
                            <div class="form-group row" hidden><label for="fechafin" class="col-md-4 col-form-label text-md-right">Fecha Fin:</label><div class="col-md-6"><input type="date" name="fechafin" id="fechafin" class="form-control" value="" required autofocus></div></div>
                            <div class="form-group row" hidden><label for="gestion" class="col-md-4 col-form-label text-md-right">Gestion:</label><div class="col-md-6"><input type="text" name="gestion" id="gestion" class="form-control" value="" required></div></div>
                            <div class="form-group row"><label for="anexo" class="col-md-4 col-form-label text-md-right">Anexo:</label><div class="col-md-6"><input type="text" name="anexo" id="anexo" class="form-control" value="" required autofocus onkeypress="return solonumeros(event);"></div></div>
                            <div class="form-group row"><label for="estado" class="col-md-4 col-form-label text-md-right">Estado:</label><div class="col-md-6"><input type="text" name="estado" id="estado" class="form-control" value="" required autofocus onkeypress="return solonumeros(event);"></div></div>
                            <div class="form-group row"><label for="tutor" class="col-md-4 col-form-label text-md-right">Tutor:</label>
                                <div class="col-md-6">
                                    <select class="custom-select">
                                        <option value="" disabled selected hidden>Nada Seleccionado</option>
                                        <?php
                                        while ($row=mysqli_fetch_assoc($datos_empleado)){
                                            echo "<option value='$row[id_empleado]'>".$row['cargo']."</option>";
                                        }
                                        ?>
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
