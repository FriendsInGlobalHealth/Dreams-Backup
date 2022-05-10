<?php include '../header.php';?>

<!DOCTYPE html>
<html>
 <head>

 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">Registo de Instancia</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="30%">Registo de Instancia</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="nome_instancia"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='nome_instancia'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var nome_instancia = [];
  $('.nome_instancia').each(function(){
   nome_instancia.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{nome_instancia:nome_instancia},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
</script>