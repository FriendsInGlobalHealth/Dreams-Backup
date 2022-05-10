<?php
//bairro.php
include('database_connection.php');

include('function.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
	header('location:index.php');
}

include('header.php');

?>

	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                		<div class="col-md-10">
                			<h3 class="panel-title">Plano de Accao</h3>
                		</div>
                	</div>

<button type="button" name="add" id="add_button" class="btn btn-success btn-xs"  data-toggle="modal"  data-target="#brandModal">Plano de Acção </button>
																			
					
                </div>
                <div class="panel-body">
                	<table id="sub_service_data" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>Cause Plan</th>
								<th>Cause Type</th>
								<th>Intervention</th>
								<th>User</th>
								<th>Responsavel</th>
								<th>Order</th>	
								<th>Date</th>
								<th>Periodo</th>									
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
                	</table>
                </div>
            </div>
        </div>
    </div>

    <div id="brandModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="sub_service_form">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Action Plan</h4>
    				</div>
    				<div class="modal-body">
					
    					<div class="form-group">
    						<select name="cause_plan_id" id="cause_plan_id" class="form-control" required>
								<option value="">Select Cause</option>
								<?php  echo fill_cause_plan_list($connect); ?>
							</select>
    					</div>
											

    					<div class="form-group">
    						<select name="cause_type_id" id="cause_type_id" class="form-control" required>
								<option value="">Select Cause Type</option>
								<?php  echo fill_cause_type_list($connect); ?>
							</select>
    					</div>  
						
    					<div class="form-group">
    						<select name="intervention_plan_id" id="intervention_plan_id" class="form-control" required>
								<option value="">Select Intervention</option>
								<?php  echo fill_intervention_plan_list($connect); ?>
							</select>
    					</div>						
						
						
    					<div class="form-group">
    						<select name="responsible_plan_id" id="responsible_plan_id" class="form-control" required>
								<option value="">Select Responsavel</option>
								<?php echo fill_responsavel_plan_list($connect); ?>
							</select>
    					</div>						
						
						
						
    					<div class="form-group">
							<label>order_evaluaction_id</label>
							<input type="text" name="order_evaluaction_id" id="order_evaluaction_id" class="form-control" required />
						</div>	

    					<div class="form-group">
							<label>date</label>
							<input type="date" name="action_plan_date" id="action_plan_date" class="form-control" required />
						</div>							
						
						

    					<div class="form-group">
							<label>Periodo</label>
							<input type="text" name="action_plan_period" id="action_plan_period" class="form-control" required />
						</div>						
						

							<input type="hidden" name="user_id" id="user_id" value=<?php echo $_SESSION["user_id"];	?> class="form-control" required />
						
											
												
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="action_plan_id" id="action_plan_id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>

		<script src="js/jquery-1.10.2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/dataTables.bootstrap.min.js"></script>	 	
		<script src="js/bootstrap.min.js"></script> 

<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#brandModal').modal('show');
		$('#sub_service_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Local Afecto");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#sub_service_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"actionplan_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#sub_service_form')[0].reset();
				$('#brandModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				branddataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var action_plan_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:'actionplan_action.php',
			method:"POST",
			data:{action_plan_id:action_plan_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#brandModal').modal('show');
				$('#cause_plan_id').val(data.cause_plan_id);
				$('#cause_type_id').val(data.cause_type_id);
				
				$('#intervention_plan_id').val(data.intervention_plan_id);
				$('#user_id').val(data.user_id);

				$('#order_evaluaction_id').val(data.order_evaluaction_id);
				$('#responsible_plan_id').val(data.responsible_plan_id);

				$('#action_plan_date').val(data.action_plan_date);
				$('#action_plan_period').val(data.action_plan_period);					
				
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Local Afecto");
				$('#action_plan_id').val(action_plan_id);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
			}
		})
	});

	$(document).on('click','.delete', function(){
		var action_plan_id = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"actionplan_action.php",
				method:"POST",
				data:{action_plan_id:action_plan_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					branddataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});


	var branddataTable = $('#sub_service_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"actionplan_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[4, 5],
				"orderable":false,
			},
		],
		"pageLength": 10
	});

});
</script>
