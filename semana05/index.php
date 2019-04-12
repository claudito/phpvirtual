<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<!-- Css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<!-- Css Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<!-- Css FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


	<title>Empleados</title>
</head>
<body>
	
<!-- Contenedor -->
<div class="container-fluid">

<!-- Fila  1 -->
<div class="row">

<!-- Columna 12 -->
<div class="col-md-12">


<button class="btn btn-primary btn-agregar" ><i class="fa fa-plus"></i> Agregar</button>

<hr>
	
<div class="table-responsive">

<table id="consulta" class="table">
	
<thead>
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Cargo</th>
<th>Sede</th>
<th>Fecha de Nacimiento</th>
<th>Fecha de Ingreso</th>
<th>Salario</th>
<th>Fecha de Creación</th>
<th>Acciones</th>
</tr>	

</thead>




</table>

</div>



</div>



</div>

</div>


<!-- Modal Registro(Agregar / Actualizar) -->
<form id="registro" autocomplete="off">
	
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<input type="hidden" name="accion" class="accion">

<input type="hidden" name="id" class="id">

<div class="form-group">
<label>Nombres</label>
<input type="text" name="nombres" class="nombres form-control" required>
</div>

<div class="form-group">
<label>Apellidos</label>
<input type="text" name="apellidos" class="apellidos form-control" required>
</div>

<div class="form-group">
<label>Fecha de Nacimiento</label>
<input type="date" name="fecha_nacimiento" class="fecha_nacimiento form-control" required>
</div>

<div class="form-group">
<label>Fecha de Ingreso</label>
<input type="date" name="fecha_ingreso" class="fecha_ingreso form-control" required>
</div>

<div class="form-group">
<label>Salario</label>
<input type="number" step="any"  name="salario" class="salario form-control" required>
</div>

      
     
<div class="form-group">
<label>Cargo</label>
<select name="cargo"  class="cargo form-control" required></select>
</div>


<div class="form-group">
<label>Sede</label>
<select name="sede" class="sede form-control" required></select>
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





<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- JS Datatable -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>

function loadData(){
	
$(document).ready(function (){

$('#consulta').DataTable({

"destroy":true,
"bAutoWidth": false,
"deferRender":true,
"iDisplayLength": 25,
 "bProcessing": true,
"sAjaxSource": "source.php?op=1",
"aoColumns":[

{ mData:"id"},
{ mData:"nombres"},
{ mData:"apellidos"},
{ mData:"cargo"},
{ mData:"sede"},
{ mData:"fecha_nacimiento"},
{ mData:"fecha_ingreso"},
{ mData:"salario"},
{ mData:"dateCreate"},
{ mData: null,render:function(data){

acciones  ='<button  data-id="'+data.id+'"  class="btn btn-primary btn-edit"><i class="fa fa-edit"></i></button> ';

acciones  +='<button data-id="'+data.id+'" class="btn btn-danger btn-delete" ><i class="fa fa-trash"></i></button>';


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

//Resetear inputs formulario
$('#registro')[0].reset();

$('.accion').val('agregar');

//Lista de Cargos
cargo  = '<option value="">[Seleccionar]</option>';

url    = 'source.php?op=4';

$.getJSON(url,{},function(data){

data.forEach(function (row){

cargo += '<option value="'+row.id+'">'+row.nombre+'</option>';

$('.cargo').html(cargo);


});


});

//Sede

sede = '<option value="">[Seleccionar]</option>';

url  = 'source.php?op=3';

$.getJSON(url,{},function(data){


data.forEach(function (row){


sede += '<option value="'+row.id+'">'+row.nombre+'</option>';

$('.sede').html(sede);

});

});



$('.modal-title').html('Agregar');
$('.btn-submit').html('Agregar');
$('#modal-registro').modal('show');


});


//Cargar Modal Actualizar
$(document).on('click','.btn-edit',function(){

id = $(this).data('id');

$('.id').val(id);

//Cargar Datos del Usuario
$.getJSON('source.php?op=6',{'id':id},function (data){

$('.nombres').val(data.nombres);
$('.apellidos').val(data.apellidos);
$('.fecha_nacimiento').val(data.fecha_nacimiento);
$('.fecha_ingreso').val(data.fecha_ingreso);
$('.salario').val(data.salario);

id_cargo = data.id_cargo;
id_sede  = data.id_sede;

});

//Lista de Cargos
cargo  = '';

url    = 'source.php?op=4';

$.getJSON(url,{},function(data){

data.forEach(function (row){

cargo += '<option value="'+row.id+'">'+row.nombre+'</option>';

$('.cargo').html(cargo);
$('.cargo').val(id_cargo);


});


});


//Sede

sede = '';

url  = 'source.php?op=3';

$.getJSON(url,{},function(data){


data.forEach(function (row){


sede += '<option value="'+row.id+'">'+row.nombre+'</option>';

$('.sede').html(sede);
$('.sede').val(id_sede);

});

});



$('.accion').val('actualizar');
$('.modal-title').html('Actualizar');
$('.btn-submit').html('Actualizar');
$('#modal-registro').modal('show');


});


//Agregar o Actualizar
$(document).on('submit','#registro',function(e){

parametros  = $(this).serialize();

$.ajax({

url:"source.php?op=2",
type:"POST",
data:parametros,
dataType:'JSON',
beforeSend:function()
{

swal({

title:"Cargando..",
text:"Espere un momento",
imageUrl:"img/loader2.gif",
showConfirmButton:false

});


},
success:function(data)
{

swal({

title:data.title,
text:data.text,
type:data.type,
timer:3000,
showConfirmButton:false
});


//Cargar loadData
loadData();

$('#modal-registro').modal('hide');




}


});

e.preventDefault();
});


//Botón Eliminar
$(document).on('click','.btn-delete',function(){

id = $(this).data('id');


swal({
  title: "¿Estás Seguro?",
  text: "El Registro Seleccionado se eliminará permanentemente",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si, estoy seguro",
  cancelButtonText:"Cancelar",
  closeOnConfirm: false
},
function(){

$.getJSON('source.php?op=5',{'id':id},function(data){

swal({

title:data.title,
text:data.text,
type:data.type,
timer:3000,
showConfirmButton:false

});

//Cargar loadData
loadData();


});


});



});



</script>

</body>
</html>