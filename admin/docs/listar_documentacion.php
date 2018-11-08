<?php
include_once('menu.php');
include_once ('../../modelo/mdl_documentacion.php');
$objeto=new mdl_documentacion();
$datos=$objeto->listar();
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Documentacion</h1>
            <p>Listado de Documentacion registrados en el sistema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Documentacion</li>
            <li class="breadcrumb-item active"><a href="#">Tabla Documentacion</a></li>
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
                            <th>Nombre</th>
                            <th>fecha Entrega</th>
                            <th>Respaldo</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num=1;
                        while($row=mysqli_fetch_assoc($datos)){
                            echo "<tr>";
                            echo "<td>$num</td>";
                            echo "<td hidden>".$row['id_documentacion']."</td>";
                            echo "<td>".$row['nombredoc']."</td>";
                            echo "<td>".$row['fechaentrega']."</td>";
                            echo "<td>".$row['respaldo']."</td>";
                            
                            
                            
                            $id_documentacion=$row['id_documentacion'];
                            $nombredoc=$row['nombredoc'];
                            $fechaentrega=$row['fechaentrega'];
                            $respaldo=$row['respaldo'];
                            $num+=1;
                            echo "<td>
                            <a class=' btn btn-success col-md-5' href='modificar_documentacion.php?id_documentacion=".$id_documentacion."&nombredoc=".$nombredoc."&fechaentrega=".$fechaentrega."&respaldo=".$respaldo."'><i class='fa fa-cog' aria-hidden='true'></i></a></td>";
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