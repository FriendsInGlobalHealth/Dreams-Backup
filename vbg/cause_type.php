<?php
//product.php

include('database_connection.php');
include('function.php');

if(!isset($_SESSION["type"]))
{
    header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
    header('location:index.php');
}

include('header.php');


?>
        <span id='alert_action'></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Cause Type List</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="product_data" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>
                                    <th>area</th>
                                    <th>area padrao</th>
                                    <th>Cause Type Name</th>
                                    <th>description</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="productModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Cause Type</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select sa_area</label>
                                <select name="area_id" id="area_id" class="form-control" required>
                                    <option value="">Select area</option>
                                    <?php echo fill_sa_area_list($connect);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select sa_area_padrao</label>
                                <select name="area_padrao_id" id="area_padrao_id" class="form-control" required>
                                    <option value="">Select area padrao</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter Cause Type Name</label>
                                <input type="text" name="cause_type_name" id="cause_type_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Enter Cause Description</label>
                                <textarea name="cause_type_description" id="cause_type_description" class="form-control" rows="5" required></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="cause_type_id" id="cause_type_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="productdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Cause Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="verification_criterion_details"></Div>
                        </div>
                        <div class="modal-footer">
                            
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
    var productdataTable = $('#product_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"cause_type_fetch.php",
            type:"POST"
        },
        "columnDefs":[
            {
                "targets":[7, 8, 9],
                "orderable":false,
            },
        ],
        "pageLength": 10
    });

    $('#add_button').click(function(){
        $('#productModal').modal('show');
        $('#product_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Criterion");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

    $('#area_id').change(function(){
        var area_id = $('#area_id').val();
        var btn_action = 'load_brand';
        $.ajax({
            url:"cause_type_action.php",
            method:"POST",
            data:{area_id:area_id, btn_action:btn_action},
            success:function(data)
            {
                $('#area_padrao_id').html(data);
            }
        });
    });

    $(document).on('submit', '#product_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url:"cause_type_action.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
                $('#product_form')[0].reset();
                $('#productModal').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                productdataTable.ajax.reload();
            }
        })
    });

    $(document).on('click', '.view', function(){
        var cause_type_id = $(this).attr("id");
        var btn_action = 'verification_criterion_details';
        $.ajax({
            url:"cause_type_action.php",
            method:"POST",
            data:{cause_type_id:cause_type_id, btn_action:btn_action},
            success:function(data){
                $('#productdetailsModal').modal('show');
                $('#verification_criterion_details').html(data);
            }
        })
    });

    $(document).on('click', '.update', function(){
        var cause_type_id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
            url:"cause_type_action.php",
            method:"POST",
            data:{cause_type_id:cause_type_id, btn_action:btn_action},
            dataType:"json",
            success:function(data){
                $('#productModal').modal('show');
                $('#area_id').val(data.area_id);
                $('#area_padrao_id').html(data.brand_select_box);
                $('#area_padrao_id').val(data.area_padrao_id);
                $('#cause_type_name').val(data.cause_type_name);
                $('#cause_type_description').val(data.cause_type_description);
                

                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Product");
                $('#cause_type_id').val(cause_type_id);
                $('#action').val("Edit");
                $('#btn_action').val("Edit");
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var cause_type_id = $(this).attr("id");
        var status = $(this).data("status");
        var btn_action = 'delete';
        if(confirm("Are you sure you want to change status?"))
        {
            $.ajax({
                url:"cause_type_action.php",
                method:"POST",
                data:{cause_type_id:cause_type_id, status:status, btn_action:btn_action},
                success:function(data){
                    $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                    productdataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });

});
</script>
