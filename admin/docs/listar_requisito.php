<?php
include_once ('menu.php');
include_once ('../../modelo/mdl_requisitos.php');
$objeto=new mdl_requisitos();
$datos=$objeto->listar_requisitos();
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Requisitos</h1>
            <p>Listado de Requisitos registrados en el sistema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Requisitos</li>
            <li class="breadcrumb-item active"><a href="#">Tabla Requisitos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a class="btn btn-secondary" href="requisitos.php">Crear Carrera</a>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead class="thead-dark">
                        <tr>
                            <th>Num</th>
                            <th>Nombre</th>
                            <th>descripcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($datos)){
                            echo "<tr>";
                            echo "<type='hidden'"."<td>".$row['id_requisitos']."</td>";
                            echo "<td>".$row['numpasantia']."</td>";
                            echo "<td>".$row['nombrerequisito']."</td>";
                            echo "<td>".$row['descripcionre']."</td>";
                            $id_requisitos=$row['id_requisitos'];
                            $numpasantia=$row['numpasantia'];
                            $nombrerequisito=$row['nombrerequisito'];
                            $descripcionre=$row['descripcionre'];
                            
                            echo "</tr>";
                            echo "</tr>";
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