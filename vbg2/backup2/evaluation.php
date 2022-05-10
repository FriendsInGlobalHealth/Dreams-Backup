<?php
//order.php

include('database_connection.php');

include('function.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

include('header.php');


?>
	<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
		$('#evaluation_order_date').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
	});
	</script>

	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			
			<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                    	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            <h3 class="panel-title">Evaluation List</h3>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>    	
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                	<table id="order_data" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>Evaluation ID</th>
								<th>Health Unit Name</th>
								<th>Total Evaluation</th>
								<th>Period Status</th>
								<th>Evaluation Status</th>
								<th>Evaluation Date</th>
								<?php
								if($_SESSION['type'] == 'master')
								{
									echo '<th>Created By</th>';
								}
								?>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
                	</table>
                </div>
            </div>
        </div>
    </div>

    <div id="orderModal" class="modal fade">

    	<div class="modal-dialog">
    		<form method="post" id="order_form">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Create Evaluation</h4>
    				</div>
    				<div class="modal-body">
    					<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Enter Unit Health</label>
									<select name="evaluation_order_us" id="evaluation_order_us" class="form-control" required>
										<option value="US">US</option>
										<option value="Policia">Policia</option>
									</select>									
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Date</label>
									<input type="text" name="evaluation_order_date" id="evaluation_order_date" class="form-control" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Enter Evaluation Type</label>
							<select name="evaluation_order_type" id="evaluation_order_type" class="form-control" required>
								<option value="Interna">Interna</option>
								<option value="Externa">Externa</option>
							</select>
							
						</div>
						<div class="form-group">
							<label>Enter Criterion Details</label>
							<hr />
							<span id="span_product_details"></span>
							<hr />
						</div>
						<div class="form-group">
							<label>Select Period Status</label>
							<select name="period_status" id="period_status" class="form-control">
								<option value="quarterly">quarterly</option>
								<option value="semiannual">semiannual</option>
							</select>
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="evaluation_order_id" id="evaluation_order_id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    				</div>
    			</div>
    		</form>
    	</div>

    </div>
		
<script type="text/javascript">
    $(document).ready(function(){

    	var orderdataTable = $('#order_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"evaluation_fetch.php",
				type:"POST"
			},
			<?php
			if($_SESSION["type"] == 'master')
			{
			?>
			"columnDefs":[
				{
					"targets":[4, 5, 6, 7, 8, 9],
					"orderable":false,
				},
			],
			<?php
			}
			else
			{
			?>
			"columnDefs":[
				{
					"targets":[4, 5, 6, 7, 8],
					"orderable":false,
				},
			],
			<?php
			}
			?>
			"pageLength": 10
		});

		$('#add_button').click(function(){
			$('#orderModal').modal('show');
			$('#order_form')[0].reset();
			$('.modal-title').html("<i class='fa fa-plus'></i> Create Evaluation");
			$('#action').val('Add');
			$('#btn_action').val('Add');
			$('#span_product_details').html('');
			add_product_row();
		});

		function add_product_row(count = '')
		{
			var html = '';
			html += '<span id="row'+count+'"><div class="row">';
			html += '<div class="col-md-8">';
			html += '<select name="criterion_verification_id[]" id="criterion_verification_id'+count+'" class="form-control selectpicker" data-live-search="true" required>';
			html += '<?php echo fill_product_list($connect); ?>';
			html += '</select><input type="hidden" name="hidden_criterion_verification_id[]" id="hidden_criterion_verification_id'+count+'" />';
			html += '</div>';
			html += '<div class="col-md-3">';
			html += '<select name="quantity[]" id="quantity" class="form-control" required> <option value="1">Sim</option> <option value="0">Nao</option></select>';
			html += '</div>';
			html += '<div class="col-md-1">';
			if(count == '')
			{
				html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
			}
			else
			{
				html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button>';
			}
			html += '</div>';
			html += '</div></div><br /></span>';
			$('#span_product_details').append(html);

			$('.selectpicker').selectpicker();
		}

		var count = 0;

		$(document).on('click', '#add_more', function(){
			count = count + 1;
			add_product_row(count);
		});
		$(document).on('click', '.remove', function(){
			var row_no = $(this).attr("id");
			$('#row'+row_no).remove();
		});

		$(document).on('submit', '#order_form', function(event){
			event.preventDefault();
			$('#action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"evaluation_action.php",
				method:"POST",
				data:form_data,
				success:function(data){
					$('#order_form')[0].reset();
					$('#orderModal').modal('hide');
					$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
					$('#action').attr('disabled', false);
					orderdataTable.ajax.reload();
				}
			});
		});

		$(document).on('click', '.update', function(){
			var evaluation_order_id = $(this).attr("id");
			var btn_action = 'fetch_single';
			$.ajax({
				url:"evaluation_action.php",
				method:"POST",
				data:{evaluation_order_id:evaluation_order_id, btn_action:btn_action},
				dataType:"json",
				success:function(data)
				{
					$('#orderModal').modal('show');
					$('#evaluation_order_us').val(data.evaluation_order_us);
					$('#evaluation_order_date').val(data.evaluation_order_date);
					$('#evaluation_order_type').val(data.evaluation_order_type);
					$('#span_product_details').html(data.product_details);
					$('#period_status').val(data.period_status);
					$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Evaluation");
					$('#evaluation_order_id').val(evaluation_order_id);
					$('#action').val('Edit');
					$('#btn_action').val('Edit');
				}
			})
		});

		$(document).on('click', '.delete', function(){
			var evaluation_order_id = $(this).attr("id");
			var status = $(this).data("status");
			var btn_action = "delete";
			if(confirm("Are you sure you want to change status?"))
			{
				$.ajax({
					url:"evaluation_action.php",
					method:"POST",
					data:{evaluation_order_id:evaluation_order_id, status:status, btn_action:btn_action},
					success:function(data)
					{
						$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
						orderdataTable.ajax.reload();
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