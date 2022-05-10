<?php
//category.php

include('database_connection.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
	header("location:index.php");
}

include('header.php');

?>

	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title">country List</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#categoryModal" class="btn btn-success btn-xs">Add</button>   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="country_data" class="table table-bordered table-striped">
                    			<thead><tr>
									<th>ID</th>
									<th>country Name</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr></thead>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="categoryModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="country_form">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add country</h4>
    				</div>
    				<div class="modal-body">
    					<label>Enter country Name</label>
						<input type="text" name="country_name" id="country_name" class="form-control" required />
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="country_id" id="country_id"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#country_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add country");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#country_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"country_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#country_form')[0].reset();
				$('#categoryModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				categorydataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var country_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"country_action.php",
			method:"POST",
			data:{country_id:country_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#categoryModal').modal('show');
				$('#country_name').val(data.country_name);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Category");
				$('#country_id').val(country_id);
				$('#action').val('Edit');
				$('#btn_action').val("Edit");
			}
		})
	});

	var categorydataTable = $('#country_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"country_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[3, 4],
				"orderable":false,
			},
		],
		"pageLength": 25
	});
	$(document).on('click', '.delete', function(){
		var country_id = $(this).attr('id');
		var status = $(this).data("status");
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"cargo_action.php",
				method:"POST",
				data:{country_id:country_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					categorydataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});
});
</script>

<?php
include('footer.php');
?>


				