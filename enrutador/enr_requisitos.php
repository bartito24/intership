<?php
require("../controlador/ctrl_requisitos.php");
$obj=new ctrl_requisitos();

if (isset($_POST["asignar"])) {
    $obj->insertar_requisitos($_POST);
                 ?>
					<script type="text/javascript">
						window.location.href="../admin/docs/listar_requisito.php";

					</script>
			    <?php 	
}elseif (isset($_GET["id_requisitos"])) 
	{
		$obj_ctrl->eliminar($_GET["id_requisitos"]);

?>
		<script type="text/javascript">
			window.location.href="../admin/docs/listar_requisito.php";

		</script>
<?php
	}	
	elseif (isset($_POST['modificar'])){
    $obj->modificar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_requisito.php';</script>";
} 

?>



