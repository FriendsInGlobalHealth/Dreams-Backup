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
                            	<h3 class="panel-title">Intervention Plan List</h3>
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
                                    <th>Intervention Plan Name</th>
                                    <th>Description</th>
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
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Verification Criterion</h4>
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
                                <label>Enter Intervention Plan Name</label>
                                <input type="text" name="intervention_plan_name" id="intervention_plan_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Enter Intervention Plan Description</label>
                                <textarea name="intervention_plan_description" id="intervention_plan_description" class="form-control" rows="5" required></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="intervention_plan_id" id="intervention_plan_id" />
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
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Intervention Details</h4>
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

<script>
$(document).ready(function(){
    var productdataTable = $('#product_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"intervention_plan_fetch.php",
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
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Intervention");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

    $('#area_id').change(function(){
        var area_id = $('#area_id').val();
        var btn_action = 'load_brand';
        $.ajax({
            url:"intervention_plan_action.php",
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
            url:"intervention_plan_action.php",
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
        var intervention_plan_id = $(this).attr("id");
        var btn_action = 'verification_criterion_details';
        $.ajax({
            url:"intervention_plan_action.php",
            method:"POST",
            data:{intervention_plan_id:intervention_plan_id, btn_action:btn_action},
            success:function(data){
                $('#productdetailsModal').modal('show');
                $('#verification_criterion_details').html(data);
            }
        })
    });

    $(document).on('click', '.update', function(){
        var intervention_plan_id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
            url:"intervention_plan_action.php",
            method:"POST",
            data:{intervention_plan_id:intervention_plan_id, btn_action:btn_action},
            dataType:"json",
            success:function(data){
                $('#productModal').modal('show');
                $('#area_id').val(data.area_id);
                $('#area_padrao_id').html(data.brand_select_box);
                $('#area_padrao_id').val(data.area_padrao_id);
                $('#intervention_plan_name').val(data.intervention_plan_name);
                $('#intervention_plan_description').val(data.intervention_plan_description);
                

                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Product");
                $('#intervention_plan_id').val(intervention_plan_id);
                $('#action').val("Edit");
                $('#btn_action').val("Edit");
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var intervention_plan_id = $(this).attr("id");
        var status = $(this).data("status");
        var btn_action = 'delete';
        if(confirm("Are you sure you want to change status?"))
        {
            $.ajax({
                url:"intervention_plan_action.php",
                method:"POST",
                data:{intervention_plan_id:intervention_plan_id, status:status, btn_action:btn_action},
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
