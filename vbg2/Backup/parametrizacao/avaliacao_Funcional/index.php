<?php include '../header.php';?>

<html>  
    <head>  
        <title>Registo de Avaliacoes</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    </head>  
    <body>  
        <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">Registo de Avaliacoes Padrao</h3><br />
		<form method="post" id="update_form">
		
		
						<div align="left">
							<input type="submit" name="multiple_update" id="multiple_update" class="btn btn-danger" value="Multiple Update" />
						</div>
						<br />
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<th width="5%"></th>
									<th width="20%">Nome da Area</th>
									<th width="30%">Nome do Padrao</th>
									<th width="20%">Criterio de Verificacao</th>
									<th width="15%">Meio Verificacao</th>
									<th width="10%">Reposta</th>
									<th width="30%">Comentario</th>
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
                    html += '<td><input type="checkbox" id="'+data[count].id+'"data-nome_area="'+data[count].nome_area+'"data-nome_area_padrao="'+data[count].nome_area_padrao+'"data-nome_criterio="'+data[count].nome_criterio+'"data-nome_meio_verificacao="'+data[count].nome_meio_verificacao+'"data-resposta="'+data[count].resposta+'"data-comentario="'+data[count].comentario+'"class="check_box"/></td>';
                    html += '<td>'+data[count].nome_area+'</td>';
                    html += '<td>'+data[count].nome_area_padrao+'</td>';
                    html += '<td>'+data[count].nome_criterio+'</td>';
					html += '<td>'+data[count].nome_meio_verificacao+'</td>';
                    html += '<td>'+data[count].resposta+'</td>';
					html += '<td>'+data[count].comentario+'</td></tr>';
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
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'"data-nome_area="'+$(this).data('nome_area')+'"data-nome_area_padrao="'+$(this).data('nome_area_padrao')+'"data-nome_criterio="'+$(this).data('nome_criterio')+'"data-nome_meio_verificacao="'+$(this).data('nome_meio_verificacao')+'"data-resposta="'+$(this).data('resposta')+'"data-comentario="'+$(this).data('comentario')+'"class="check_box" checked /></td>';
            html += '<td><input type="text" name="nome_area[]" class="form-control" value="'+$(this).data("nome_area")+'" /></td>';
            html += '<td><input type="text" name="nome_area_padrao[]" class="form-control" value="'+$(this).data("nome_area_padrao")+'" /></td>';
            html += '<td><input type="text" name="nome_criterio[]" class="form-control" value="'+$(this).data("(nome_criterio")+'" /></td>';
			html += '<td><input type="text" name="nome_meio_verificacao[]" class="form-control" value="'+$(this).data("nome_meio_verificacao")+'" /></td>';
            html += '<td><select name="resposta[]" id="gender_'+$(this).attr('id')+'" class="form-control"><option value="1">SIM</option><option value="2">Nao</option></select></td>';			
            html += '<td><input type="text" name="comentario[]" class="form-control" value="'+$(this).data("comentario")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'"data-nome_area="'+$(this).data('nome_area')+'"data-nome_area_padrao="'+$(this).data('nome_area_padrao')+'"data-nome_criterio="'+$(this).data('nome_criterio')+'"data-nome_meio_verificacao="'+$(this).data('nome_meio_verificacao')+'"data-resposta="'+$(this).data('resposta')+'"data-comentario="'+$(this).data('comentario')+'"class="check_box" /></td>';
            html += '<td>'+$(this).data('nome_area')+'</td>';
            html += '<td>'+$(this).data('nome_area_padrao')+'</td>';
            html += '<td>'+$(this).data('nome_criterio')+'</td>';
            html += '<td>'+$(this).data('nome_meio_verificacao')+'</td>'; 			
            html += '<td>'+$(this).data('resposta')+'</td>';			
            html += '<td>'+$(this).data('comentario')+'</td>';            
        }
        $(this).closest('tr').html(html);
        $('#gender_'+$(this).attr('id')+'').val($(this).data('resposta'));
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
