<?php
//index.php
include('database_connection.php');
include('function.php');

if(!isset($_SESSION["type"]))
{
	header("location:login.php");
}

include('header.php');

?>
	<br />
	<div class="row">
	<?php
	if($_SESSION['type'] == 'master')
	{
	?>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total User</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_user($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total Area</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_sa_area($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total Area Padrao</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_area_padrao($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Evaluation Pendente</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_criterion_verification($connect); ?></h1>
			</div>
		</div>
	</div>
	<?php
	}
	?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Evaluation</strong></div>
				<div class="panel-body" align="center">
					<h1><?php echo count_total_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Evaluation quarterly</strong></div>
				<div class="panel-body" align="center">
					<h1><?php echo count_total_cash_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total semiannual Order Value</strong></div>
				<div class="panel-body" align="center">
					<h1><?php echo count_total_credit_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<hr />
		<?php
		if($_SESSION['type'] == 'master')
		{
		?>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Evaluation User wise</strong></div>
				<div class="panel-body" align="center">
					<?php echo get_user_wise_total_order($connect); ?>
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>

<?php
include("footer.php");
?>