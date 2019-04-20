<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= URL ?>">CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimientos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>pages/empleado.php">Empleado</a>
          <a class="dropdown-item" href="#">Sede</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Cargo</a>
        </div>
      </li>

    </ul>
  
    <a class="logout" style="cursor: pointer;">Salir</a>

  </div>
</nav>


<script>
  
$(document).on('click','.logout',function(){


$.getJSON('<?= URL ?>source/logout.php',{},function(data){

 if(data.type=='success')
 {

swal({

title:data.title,
type:data.type,
timer:3000,
showConfirmButton:false
});


 setTimeout(function(){

window.location.href='<?= URL ?>' 


},3000);


 }
 else
 {

  



 }


});



});

</script>
