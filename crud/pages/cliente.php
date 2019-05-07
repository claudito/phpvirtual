<?php 

include'../config.php';
include'../acceso.php';

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cliente</title>
<!-- Css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<!-- Css Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<!-- Css FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- JS Datatable -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Export -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>



</head>
<body>
	
<div class="container-fluid">

<div class="row">
	
<div class="col-md-12">
	
<?php include'../templates/nav.php'; ?>


</div>
</div>

<div class="row">
	
<div class="col-md-12">
	
<button class="btn btn-primary btn-agregar"><i class="fa fa-plus"></i> Agregar</button>

<hr>

<div class="table-responsive">
  <table id="consulta" class="table" style="font-size: 12px">
    <thead>
      <tr>
        <th>Id</th>
        <th>Razón Social</th>
        <th>Ruc</th>
        <th>DNI</th>
        <th>Estado</th>
        <th>Condición</th>
        <th>Oficio</th>
        <th>Acciones</th>
      </tr>
    </thead>
  </table>
</div>



</div>


</div>



</div>


<!-- Modal Crear Cliente -->
<form id="agregar" autocomplete="off">

<div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<div class="input-group mb-3">

<input type="number" class="numero form-control" required 
>

<div class="input-group-append">

<button type="button" class="btn btn-outline-secondary btn-buscar">Buscar</button>

</div>


</div>

<div class="form-group">
<label>Razon Social</label>
<input type="text" name="razon_social" class="razon_social form-control">
</div>


<div class="form-group">
<label>Ruc</label>
<input type="text" name="ruc" class="ruc form-control" required>
</div>


<div class="form-group">
<label>Estado</label>
<input type="text" name="estado" class="estado form-control" required>
</div>

<div class="form-group">
<label>Condición</label>
<input type="text" name="condicion" class="condicion form-control" required>
</div>

<div class="form-group">
<label>Oficio</label>
<input type="text" name="oficio" class="oficio form-control" required>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>

</form>

<script>

function loadData(){
  
$(document).ready(function (){

$('#consulta').DataTable({

dom:'lBfrtip',
buttons:[

{

extend:'excelHtml5',
title:'Empleados',
sheetName:'Empleados'

},
{

extend:'pdfHtml5',
title:'Empleados',
orientation:'landscape',
pageSize:'LEGAL'

},
{
extend: 'print',
text: 'Imprimir',
autoPrint: true

}

],
"destroy":true,
"bAutoWidth": false,
"deferRender":true,
"iDisplayLength": 25,
 "bProcessing": true,
"sAjaxSource": "../source/cliente.php?op=3",
"aoColumns":[

{ mData:"id"},
{ mData:"razon_social"},
{ mData:"ruc"},
{ mData:"dni"},
{ mData:"estado"},
{ mData:"condicion"},
{ mData:"oficio"},
{ mData: null,render:function(data){

acciones  ='<button  data-id="'+data.id+'"  class="btn btn-primary btn-edit btn-sm"><i class="fa fa-edit"></i></button> ';

acciones  +='<button data-id="'+data.id+'" class="btn btn-danger btn-delete btn-sm" ><i class="fa fa-trash"></i></button>';


 return  acciones;


}}


],
"language":{

"url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"


}


});


});


}


//Cargar Función loadData()
loadData();




	
//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function(){

$("#agregar")[0].reset();
$('.btn-submit').html('Crear');
$('.modal-title').html('Crear Cliente');
$('#modal-agregar').modal('show');

});


//Buscar Número (DNI / RUC)
$(document).on('click','.btn-buscar',function(){

//Validación
numero = $('.numero').val();

if(numero=='')
{

swal({

title:"Campo Vacío",
text:"Ingrese un valor para realizar consulta",
type:"info",
showConfirmButton:false,
timer:3000

});

return false;

} 

//Enviar por ajax

$.ajax({

url:'../source/cliente.php?op=1',
type:'POST',
data:{'numero':numero},
dataType:'JSON',
beforeSend:function(){

swal({

title:"Cargando..",
text:"Espere un momento",
imageUrl:"../img/loader2.gif",
showConfirmButton:false,
//timer:2000

});


},
success:function(data){

if(data.success==true)
{

swal({

title:"Buen Trabajo",
text:"Registro Encontrado",
type:"success",
showConfirmButton:false,
timer:1000

});

$('.razon_social').val(data.result.razon_social);
$('.ruc').val(data.result.ruc);
$('.estado').val(data.result.estado);
$('.condicion').val(data.result.condicion);
$('.oficio').val(data.result.oficio);

}
else
{

swal({

title:"Error",
text:data.message,
type:"error",
showConfirmButton:false,
timer:4000

});

$('.razon_social').val('');
$('.ruc').val('');
$('.estado').val('');


}




}


});


});


//Agregar Cliente
$(document).on('submit','#agregar',function(e){

parametros = $(this).serialize();

$.ajax({

 url:"../source/cliente.php?op=2",
 type:"POST",
 data:parametros,
 dataType:"JSON",
 beforeSend:function()
 {

swal({

title:"Cargando..",
text:"Espere un momento",
imageUrl:"../img/loader2.gif",
showConfirmButton:false,
//timer:2000

});


 }
 ,
 success:function(data)
 {

swal({

title:data.title,
text:data.text,
type:data.type,
showConfirmButton:false,
timer:3000

});

$("#agregar")[0].reset();
$('#modal-agregar').modal('hide');
loadData();


 }



});



e.preventDefault();
});



</script>
</body>
</html>