<?php

	require_once "bd/conexion.php";
	$conexion=conexion();

?>


<div class="row">
	<div class="col-sm-12">
	<h2>Tabla dinamica facultad autodidacta</h2>
		<table class="tabla tabla-hover tabla-condensed tabla-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
			Agregar nuevo
			<span class="glyphicon glyphicon-plus"></span>
			</button>
			
			</caption>
				<tr>
					<td>action_plan_id</td>
					<td>cause_plan_id</td>
					<td>cause_type_id</td>
					<td>intervention_plan_id</td>
				</tr>
				
				<?php
				
					$sql="SELECT action_plan_id, cause_plan_id, cause_type_id, 	intervention_plan_id
					FROM sa_action_plan";
					
					$result = mysqli_query($conexion,$sql);
					while($ver=mysqli_fetch_row($result)){
				?>
				
				<tr>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php echo $ver[4] ?></td>
					<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="
					modal" data-target="#modalEdicion">
					
					</button>
					</td>
					<td>
						<button class="btn btn-danger glyphicon glyphicon-remove"></button>
					</td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
						