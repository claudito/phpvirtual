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
<th>Nombres</th>
<th>Apellidos</th>
<th>Cargo</th>
<th>Sede/Oficina</th>
<th>Fecha de Nacimiento</th>
<th>Edad</th>
<th>Fecha de Ingreso</th>
<th>Antigüedad</th>
<th>Salario</th>
<th>Acciones</th>
</tr>	

</thead>


<tbody>

<tr>
<td>Luis</td>
<td>Claudio</td>
<td>Programador</td>
<td>Lima</td>
<td>15/07/1990</td>
<td>28</td>
<td>01/01/2019</td>
<td>3 Meses</td>
<td>S/. 1000</td>
<td>
	
<button class="btn btn-primary btn-edit"><i class="fa fa-edit"></i></button>


</td>
</tr>

</tbody>


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

        <button type="button" class="btn btn-primary btn-submit">Save changes</button>

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
	
//Data
$(document).ready(function (){

$('#consulta').DataTable({

"language":{

"url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"


}


});


});


//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function(){

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


$('.modal-title').html('Actualizar');
$('.btn-submit').html('Actualizar');
$('#modal-registro').modal('show');


});



</script>

</body>
</html>