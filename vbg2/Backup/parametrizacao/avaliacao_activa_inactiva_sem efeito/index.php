<?php include '../header.php';?>

<html>  
    <head>  
        <title>Activacao das Avaliacoes</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    </head>  
    <body>  
        <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">Activacao das Avaliacoes</h3><br />
		<form method="post" id="update_form">
		
		
						<div align="left">
							<input type="submit" name="multiple_update" id="multiple_update" class="btn btn-danger" value="Multiple Update" />
						</div>
						<br />
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<th width="5%"></th>
									<th width="20%">Data de Inicio</th>
									<th width="30%">Nome da Activacao</th>
									<th width="20%">Tipo de Instancia</th>
									<th width="15%">Tipo de Avaliacao</th>
									<th width="10%">Estado</th>
									<th width="30%">Data Final</th>
								</thead>
								<tbody></tbody>
							</table>
						</div>

					</form>
   </div>  
  </div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
            url:"select.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id_a="'+data[count].id_a+'"data-data_avaliacao="'+data[count].data_avaliacao+'"data-nome_avaliacao="'+data[count].nome_avaliacao+'"data-instancia_id="'+data[count].instancia_id+'"data-tipo_avaliacao_id="'+data[count].tipo_avaliacao_id+'"data-estado="'+data[count].estado+'"data-data_fim_avaliacao="'+data[count].data_fim_avaliacao+'"class="check_box"/></td>';
                    html += '<td>'+data[count].data_avaliacao+'</td>';
                    html += '<td>'+data[count].nome_avaliacao+'</td>';
                    html += '<td>'+data[count].instancia_id+'</td>';
					html += '<td>'+data[count].tipo_avaliacao_id+'</td>';
                    html += '<td>'+data[count].estado+'</td>';
					html += '<td>'+data[count].data_fim_avaliacao+'</td></tr>';
                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {
            html = '<td><input type="checkbox" id_a="'+$(this).attr('id_a')+'"data-data_avaliacao="'+$(this).data('data_avaliacao')+'"data-nome_avaliacao="'+$(this).data('nome_avaliacao')+'"data-instancia_id="'+$(this).data('instancia_id')+'"data-tipo_avaliacao_id="'+$(this).data('tipo_avaliacao_id')+'"data-estado="'+$(this).data('estado')+'"data-data_fim_avaliacao="'+$(this).data('data_fim_avaliacao')+'"class="check_box" checked /></td>';
            html += '<td><input type="date" name="data_avaliacao[]" class="form-control" value="'+$(this).data("data_avaliacao")+'" /></td>';
            html += '<td><input type="text" name="nome_avaliacao[]" class="form-control" value="'+$(this).data("nome_avaliacao")+'" /></td>';
            html += '<td><input type="text" name="instancia_id[]" class="form-control" value="'+$(this).data("(instancia_id")+'" /></td>';
			html += '<td><input type="text" name="tipo_avaliacao_id[]" class="form-control" value="'+$(this).data("tipo_avaliacao_id")+'" /></td>';
            html += '<td><select name="estado[]" id_a="gender_'+$(this).attr('id_a')+'" class="form-control"><option value="1">SIM</option><option value="0">Nao</option></select></td>';			
            html += '<td><input type="date" name="data_fim_avaliacao[]" class="form-control" value="'+$(this).data("data_fim_avaliacao")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id_a')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id_a="'+$(this).attr('id_a')+'"data-data_avaliacao="'+$(this).data('data_avaliacao')+'"data-nome_avaliacao="'+$(this).data('nome_avaliacao')+'"data-instancia_id="'+$(this).data('instancia_id')+'"data-tipo_avaliacao_id="'+$(this).data('tipo_avaliacao_id')+'"data-estado="'+$(this).data('estado')+'"data-data_fim_avaliacao="'+$(this).data('data_fim_avaliacao')+'"class="check_box" /></td>';
            html += '<td>'+$(this).data('data_avaliacao')+'</td>';
            html += '<td>'+$(this).data('nome_avaliacao')+'</td>';
            html += '<td>'+$(this).data('instancia_id')+'</td>';
            html += '<td>'+$(this).data('tipo_avaliacao_id')+'</td>'; 			
            html += '<td>'+$(this).data('estado')+'</td>';			
            html += '<td>'+$(this).data('data_fim_avaliacao')+'</td>';            
        }
        $(this).closest('tr').html(html);
        $('#gender_'+$(this).attr('id_a')+'').val($(this).data('estado'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"multiple_update.php",
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Data Updated');
                    fetch_data();
                }
            })
        }
    });

});  
</script>
