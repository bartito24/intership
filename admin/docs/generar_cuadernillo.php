<?php
include_once('menu.php');
include_once ('../../modelo/conexion.php');
?>
<link rel='stylesheet' href='../../fullcalendar/fullcalendar.css' />

<script src='../../fullcalendar/lib/moment.min.js'></script>

<main class="app-content">


    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Cuadernillo</h1>
            <p>Registro Cuadernillo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Cuadernillo</li>
            <li class="breadcrumb-item"><a href="#">Registro Cuadernillo</a></li>
        </ul>
    </div>

        <div class="form-group row">
            <div class="col-md-5">
                <div class="tile">
                    <center><h3 class="tile-title">CUADERNILLO</h3></center>
                    <hr>

                        <div class="form-group ">
                            <form name="f1" action="../../enrutador/enr_cuadernillo.php" method="post" autocomplete="off" required>
                                <div class="form-group row" style="text-align:center">
                                    <div class ="col-md-6"><button type="submit" class="btn btn-outline-primary" name="generar">
                                            <span class="glyphicon glyphicon-pencil"></span>Generar Cuaderno
                                        </button></div>
                                    <div class ="col-md-4"><a class="btn btn-danger" href="index.php">Cancelar
                                        </a></div>
                                </div>

                            </form>
                                </div>
                    </div>
                </div>
            <div class="col-md-7">
                <div class="tile">
                    <div class="tile-title"><center><h3>Fechas Registradas</h3></center></div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                </div>
            </div>
            </div>
        </div>

</main>

<!-- Page specific javascripts-->
<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: {
                url: 'datos.php',
                type: 'POST', // Send post data
            }
        });
    });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>