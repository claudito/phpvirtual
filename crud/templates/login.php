<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>
<!-- Css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<!-- Css Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<!-- Css FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">



</head>
<body>

<div class="conatainer-fluid">

<div class="row justify-content-center">
	

<div class="col-md-4">
	

<h1>Login</h1>
<hr>

<form id="login">
	

<div class="form-group">
<label>Usuario</label>
<input type="text" pattern="[a-zA-Z0-9-.]+"   name="usuario" class="usuario form-control" required>
</div>


<div class="form-group">
<label>Contraseña</label>
<input type="password" pattern="[a-zA-Z0-9]+"  name="password" class="password form-control" required>
</div>

<button class="btn btn-primary">Ingresar</button>


</form>




</div>



</div>

</div>



<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- JS Datatable -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<script>
$(document).on('submit','#login',function(e){

parametros = $(this).serialize();

$.ajax({

url:'source/login.php',
type:'POST',
data:parametros,
dataType:'JSON',
beforeSend:function()
{

swal({

title:'Cargando',
text:'Espere un momento',
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


//refres login
if(data.type=='success')
{

setTimeout(function(){

window.location.href='./'	


},3000);


}





}




});




e.preventDefault();
});

</script>

</body>
</html>