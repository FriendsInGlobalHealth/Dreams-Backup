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
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info" value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th width="5%"></th>
                                <th width="20%">Data de Avaliacao</th>
                                <th width="30%">Nome da Avaliacao</th>
                                <th width="15%">Resultado</th>
                                <th width="20%">Avaliacao ID</th>
                                <th width="10%">Meio Verificacao</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
					
					
					    <!-- Card body -->
    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
        labore sustainable VHS.
      </div>
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
                    html += '<td><input type="checkbox" id="'+data[count].id+'" data-data_avaliacao="'+data[count].data_avaliacao+'" data-nome_avaliacao_padrao="'+data[count].nome_avaliacao_padrao+'" data-resultado="'+data[count].resultado+'" data-Avaliacao_id="'+data[count].Avaliacao_id+'" data-Meio_Verificacao_id="'+data[count].Meio_Verificacao_id+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].data_avaliacao+'</td>';
                    html += '<td>'+data[count].nome_avaliacao_padrao+'</td>';
                    html += '<td>'+data[count].resultado+'</td>';
                    html += '<td>'+data[count].Avaliacao_id+'</td>';
                    html += '<td>'+data[count].Meio_Verificacao_id+'</td></tr>';
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
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-data_avaliacao="'+$(this).data('data_avaliacao')+'" data-nome_avaliacao_padrao="'+$(this).data('nome_avaliacao_padrao')+'" data-resultado="'+$(this).data('resultado')+'" data-Avaliacao_id="'+$(this).data('Avaliacao_id')+'" data-Meio_Verificacao_id="'+$(this).data('Meio_Verificacao_id')+'" class="check_box" checked /></td>';
            html += '<td><input type="date" name="data_avaliacao[]" class="form-control" value="'+$(this).data("data_avaliacao")+'" /></td>';
            html += '<td><input type="text" name="nome_avaliacao_padrao[]" class="form-control" value="'+$(this).data("nome_avaliacao_padrao")+'" /></td>';
            html += '<td><select name="resultado[]" id="gender_'+$(this).attr('id')+'" class="form-control"><option value="1">Male</option><option value="2">Female</option></select></td>';
            html += '<td><input type="text" name="Avaliacao_id[]" class="form-control" value="'+$(this).data("Avaliacao_id")+'" /></td>';
            html += '<td><input type="text" name="Meio_Verificacao_id[]" class="form-control" value="'+$(this).data("Meio_Verificacao_id")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-data_avaliacao="'+$(this).data('data_avaliacao')+'" data-nome_avaliacao_padrao="'+$(this).data('nome_avaliacao_padrao')+'" data-resultado="'+$(this).data('resultado')+'" data-Avaliacao_id="'+$(this).data('Avaliacao_id')+'" data-Meio_Verificacao_id="'+$(this).data('Meio_Verificacao_id')+'" class="check_box" /></td>';
            html += '<td>'+$(this).data('data_avaliacao')+'</td>';
            html += '<td>'+$(this).data('nome_avaliacao_padrao')+'</td>';
            html += '<td>'+$(this).data('resultado')+'</td>';
            html += '<td>'+$(this).data('Avaliacao_id')+'</td>';
            html += '<td>'+$(this).data('Meio_Verificacao_id')+'</td>';            
        }
        $(this).closest('tr').html(html);
        $('#gender_'+$(this).attr('id')+'').val($(this).data('resultado'));
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
