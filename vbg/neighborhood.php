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
                			<h3 class="panel-title">Lista de Bairros</h3>
                		</div>
                		<div class="col-md-2" align="right">
                			<button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
                		</div>
                	</div>
                </div>
                <div class="panel-body">
                	<table id="sub_service_data" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>Pais</th>
								<th>Provincia</th>
								<th>Distrito</th>
								<th>Bairro</th>
								<th>Latitude</th>
								<th>Longitude</th>								
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
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Bairro</h4>
    				</div>
    				<div class="modal-body">
					
    					<div class="form-group">
    						<select name="country_id" id="country_id" class="form-control" required>
								<option value="">Select Country</option>
								<?php echo fill_country_list($connect); ?>
							</select>
    					</div>
											

    					<div class="form-group">
    						<select name="province_id" id="province_id" class="form-control" required>
								<option value="">Select Provincia</option>
								<?php echo fill_province_parameter_list($connect); ?>
							</select>
    					</div>  
						
    					<div class="form-group">
    						<select name="district_id" id="district_id" class="form-control" required>
								<option value="">Select Distrito</option>
								<?php echo fill_district_list($connect); ?>
							</select>
    					</div>						
						
    					<div class="form-group">
							<label>Enter Latitude_N</label>
							<input type="text" name="Latitude_N" id="Latitude_N" class="form-control" required />
						</div>
						
    					<div class="form-group">
							<label>Enter Longitude_E</label>
							<input type="text" name="Longitude_E" id="Longitude_E" class="form-control" required />
						</div>						
						
    					<div class="form-group">
							<label>Enter Bairro Name</label>
							<input type="text" name="bairro_name" id="bairro_name" class="form-control" required />
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="bairro_id" id="bairro_id" />
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
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Bairro");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#sub_service_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"neighborhood_action.php",
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
		var bairro_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:'neighborhood_action.php',
			method:"POST",
			data:{bairro_id:bairro_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#brandModal').modal('show');
				$('#country_id').val(data.country_id);
				$('#province_id').val(data.province_id);
				
				$('#district_id').val(data.district_id);
				$('#bairro_name').val(data.bairro_name);

				$('#Longitude_E').val(data.Longitude_E);
				$('#Latitude_N').val(data.Latitude_N);				
				
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Bairro");
				$('#bairro_id').val(bairro_id);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
			}
		})
	});

	$(document).on('click','.delete', function(){
		var bairro_id = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"neighborhood_action.php",
				method:"POST",
				data:{bairro_id:bairro_id, status:status, btn_action:btn_action},
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
			url:"neighborhood_fetch.php",
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
