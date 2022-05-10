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
                			<h3 class="panel-title">Distrito List</h3>
                		</div>
                		<div class="col-md-2" align="right">
                			<button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
                		</div>
                	</div>
                </div>
                <div class="panel-body">
                	<table id="brand_data" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>Provincia</th>
								<th>Distrito Name</th>
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
    		<form method="post" id="brand_form">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Distrito</h4>
    				</div>
    				<div class="modal-body">
    					<div class="form-group">
    						<select name="province_id" id="province_id" class="form-control" required>
								<option value="">Select Provincia</option>
								<?php echo fill_province_parameter_list($connect); ?>
							</select>
    					</div>
    					<div class="form-group">
							<label>Enter District Name</label>
							<input type="text" name="district_name" id="district_name" class="form-control" required />
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="district_id" id="district_id" />
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
		$('#brand_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Brand");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#brand_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"district_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#brand_form')[0].reset();
				$('#brandModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				branddataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var district_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:'district_action.php',
			method:"POST",
			data:{district_id:district_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#brandModal').modal('show');
				$('#province_id').val(data.province_id);
				$('#district_name').val(data.district_name);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Brand");
				$('#district_id').val(district_id);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
			}
		})
	});

	$(document).on('click','.delete', function(){
		var district_id = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"district_action.php",
				method:"POST",
				data:{district_id:district_id, status:status, btn_action:btn_action},
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


	var branddataTable = $('#brand_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"district_fetch.php",
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