<?php
include_once('menu.php');
include_once ('../../modelo/mdl_pasantia.php');
$objeto=new mdl_pasantia();
$datos=$objeto->listar();
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Pasantía</h1>
            <p>Listado de Pasantías registrados en el sistema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Pasantías</li>
            <li class="breadcrumb-item active"><a href="#">Tabla Pasantias</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead class="thead-dark">
                        <tr>
                            <th>Num</th>
                            <th>Fecha Inicio</th>
                            <th>Estudiante</th>
                            <th>Carrera</th>
                            <th>Modalidad</th>
                            <th>Area</th>
                            <th>Pasantía</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num=1;
                        while($row=mysqli_fetch_assoc($datos)){
                            echo "<tr>";
                            echo "<td>$num</td>";
                            echo "<td>".$row['fechainicio']."</td>";
                            echo "<td style='text-transform: capitalize'>".$row['nombre']."</td>";
                            echo "<td style='text-transform: capitalize'>".$row['nombrecarrera']."</td>";
                            echo "<td style='text-transform: capitalize'>".$row['modalidad']."</td>";
                            echo "<td style='text-transform: capitalize'>".$row['area']."</td>";
                            echo "<td style='text-transform: capitalize'>".$row['nombreasignatura']." ".$row['nivel']."</td>";
                            $id_pasantia=$row['id_pasantia'];
                            $id_empleado=$row['id_empleado'];
                            $nombre=$row['nombre'];
                            echo "<td><a class='btn btn-info col-md-7' href='ver_pasantia.php?id_pasantia=".$id_pasantia."&id_empleado=".$id_empleado."'>Detalle</a>
                                  <a class='btn btn-danger col-md-4' href='../../enrutador/enr_pasantia.php?id_pasantia=".$id_pasantia."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                            echo "</tr>";
                            $num+=1;
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->

<!-- The javascript plugin to display page loading on top-->
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>