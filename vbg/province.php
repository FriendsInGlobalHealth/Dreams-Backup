<?php
//brand.php
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
                			<h3 class="panel-title">Province List</h3>
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
								<th>Country</th>
								<th>Province Name</th>
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
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Province</h4>
    				</div>
    				<div class="modal-body">
    					<div class="form-group">
    						<select name="country_id" id="country_id" class="form-control" required>
								<option value="">Select Country</option>
								<?php echo fill_country_list($connect); ?>
							</select>
    					</div>
    					<div class="form-group">
							<label>Enter Province Name</label>
							<input type="text" name="province_name" id="province_name" class="form-control" required />
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="province_id" id="province_id" />
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
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Province");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#sub_service_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"province_action.php",
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
		var province_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:'province_action.php',
			method:"POST",
			data:{province_id:province_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#brandModal').modal('show');
				$('#country_id').val(data.country_id);
				$('#province_name').val(data.province_name);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Brand");
				$('#province_id').val(province_id);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
			}
		})
	});

	$(document).on('click','.delete', function(){
		var province_id = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"province_action.php",
				method:"POST",
				data:{province_id:province_id, status:status, btn_action:btn_action},
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
			url:"province_fetch.php",
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


<?php
include('footer.php');
?>