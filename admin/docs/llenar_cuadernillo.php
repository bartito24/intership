<?php
include_once('menu.php');
include_once ('../../modelo/conexion.php');
?>

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
                                <div class="form-group row">
                                    <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="fecha" id="fecha" class="form-control" value="" maxlength="12" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                                    <div class="col-md-8">
                                        <textarea type="text" name="descripcion" id="descripcion" class="form-control"  required autofocus onkeypress="return sololetras(event);"></textarea>
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
<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#external-events .fc-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            }
        });
    });
</script>