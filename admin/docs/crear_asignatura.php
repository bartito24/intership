<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asignatura</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../../js/validacion.js"></script>
    <?php include_once('menu.php');
    ?>
</head>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Asignaturas</h1>
            <p>Registro Asignaturas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Asignaturas</li>
            <li class="breadcrumb-item"><a href="#">Registro Asignaturas</a></li>
        </ul>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Nueva Asignaturas</h3></center>
                    <div class="tile-body">
                        <form name="f1" action="../../enrutador/enr_asignatura.php" method="post" autocomplete="off" required>
                            <div class="form-group row">
                                <label for="nombreasignatura" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                <div class="col-md-6">
                                    <input type="text" name="nombreasignatura" id="nombreasignatura" class="form-control" value="" required autofocus onkeypress="return letras(event);">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcionasig" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                                <div class="col-md-6">
                                    <input type="text" name="descripcionasig" id="descripcionasig" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nivel" class="col-md-4 col-form-label text-md-right">Nivel:</label>
                                <div class="col-md-6">
                                    <input type="number" name="nivel" id="nivel" class="form-control" value="" required min="1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="requisito" class="col-md-4 col-form-label text-md-right">Requisitos:</label>
                                <div class="col-md-6">
                                    <select type="text" name="requisito" id="requisito" class="form-control" value=""  autofocus onkeypress="return numeros(event);">
                                        <option value=""></option>
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
                                <div class ="col-md-4"><a class="btn btn-danger" href="menu.php">Cancelar
                                    </a></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="tile">
                    <center><h3 class="tile-title">Asignaturas Creadas</h3></center>
                    <div class="tile-body">
                        
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>

</main>
</body>
</html>
