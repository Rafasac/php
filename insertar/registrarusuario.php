<?php include('BDconect.php');?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description"
    content="Rafa Santiago ejemplo de como insertar información en una base de datos con Php y MySQL usando PDO">
  <meta name="author" content="Rafa Santiago Cruz">
  <title>Rafa Santiago | Demostracion de como insertar información en una base de datos</title>

  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      setTimeout(function () {
        $(".content").fadeOut(1500);
      }, 3000);

    });
  </script>
</head>

<body>
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">Rafa
        Santiago</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span
          class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span
                class="sr-only">(current)</span></a> </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
        </form>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->

  <div class="container">
    <?php
    
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$estado=$_POST['estado'];
///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into usuario(id,nombre,correo,contrasena,estado) values(:id,:nombre,:correo,:contrasena,:estado)";
    
$sql = $connect->prepare($sql);
    
$sql->bindValue(':id', null, PDO::PARAM_INT);
$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR, 25);
$sql->bindParam(':correo',$correo,PDO::PARAM_STR, 25);
$sql->bindParam(':contrasena',$contrasena,PDO::PARAM_STR,25);
$sql->bindParam(':estado',$estado,PDO::PARAM_STR,25);
    
$sql->execute();

$lastInsertId = $connect->lastInsertId();
if($lastInsertId>0){

echo "<div class='content alert alert-primary' > Registro exitoso  : $nombre  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
    <h3 class="mt-5">Insertar información, ejemplo de registro de usuarios.</h3>
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <form action="" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nombre">Nombre(s)</label>
              <input name="nombre" type="text" class="form-control" placeholder="Nombre(s)">
            </div>
            <div class="form-group col-md-6">
              <label for="correo">Correo</label>
              <input name="correo" type="text" class="form-control" id="correo" placeholder="correo">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contrasena">Contraseña</label>
              <input name="contrasena" type="text" class="form-control" id="contrasena" placeholder="contraseña">
            </div>

            <div class="form-group col-md-6">
              <label for="estado">Estado</label>
              <input name="estado" type="text" class="form-control" id="estado" placeholder="Estado">
            </div>

          </div>
          <div class="form-group">
            <button name="insertar" type="submit" class="btn btn-primary  btn-block">Guardar</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-12">
        <!-- Contenido -->
        </form>
      </div>
    </div>


    <!-- Fin Contenido -->
  </div>
  </div>
  <!-- Fin row -->

  </div>
  <!-- Fin container -->
  <footer class="footer">
    <div class="container"> <span class="text-muted">
        <p>Códigos <a href="https://rafasantiago.mx/" target="_blank">Rafael Santiago</a></p>
      </span> </div>
  </footer>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <script src="dist/js/bootstrap.min.js"></script>
  <!-- Placed at the end of the document so the pages load faster -->
</body>

</html>