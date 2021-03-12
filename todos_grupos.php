<?php 
// incluto el archivo de configuracion con los datos de la base de datos, el ususario y la contraseña
include("configuracion.php");
// Realizo la conexion a la base de datos mandando las variables que hay en el archivo configuracion.php
$conexion = new mysqli($server,$user,$pass,$bd);
// Si la conexion no es exitosa, sacó un anuncio de error y CIERRO comunicacion
if (mysqli_connect_errno()){
    echo "No conectado", mysqli_connect_error();
    exit();
// Si la conexion es exitosa, aviso internamente con un mensaje.
}else{
    $conexion -> query('SET CHARACTER SET UTF8');
    echo 'CONECTADO';
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="node_modules/ionicons/css/ionicons.min.css">
    <link href="https://allfont.es/allfont.css?fonts=roboto-slab-regular" rel="stylesheet" type="text/css" />


    <!-- css.css ES un archivo que creé para dar un color especfico. con Link se le dice al compilador que hay un archivo de estilo-->
    <link rel="stylesheet" href="css/css.css">

    <!--<title>Hello, world!</title>-->
  </head>
  <body>
    <!--<h1>Hello, world!</h1>-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jQuery/dist/jQuery.min.JS"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--BARRA DE NAVEGACION-->
    <nav  class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand">Investigación</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item "><a class="nav-link" href="./index.php">Inicio</a></li>
          <li class="nav-item "><a class="nav-link" href="./nosotros.html">Nosotros</a></li>
          <li class="nav-item "><a class="nav-link" href="./contacto.html">Contacto</a></li>
          <li class="nav-item "><a class="nav-link" href="./ingreso.php">Ingresar</a></li>
          <li class="nav-item active"><a class="nav-link" href="#">Resultados</a></li>

        </ul>
      </div>
    </nav>


    <div class="jumbotron">
      
        <h1 class="display-4 titulo">Investigaciones y Publicaciones - Escuela de idiomas</h1>
        
      </div>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Resultados</li>
        </ol>
      </nav>
      
      <!-- BOTON PARA HACER NUEVA BUSQUEDA -->
        <div style="margin-bottom: 50px; margin-top: 0px">
            <a class="btn btn-outline-secondary" style="float: right;" data-toggle="modal" data-target="#Investigacion" id=""
                data-toggle="popover">Nueva Búsqueda</a>
        </div>
        <div>
            <h1>Resultados de la búsqueda:</h1>
        <!-- <button type="button" class="btn btn-outline-secondary" 
                data-toggle="modal" data-target="#Investigacion" id="BuscarPublicacion"
                data-toggle="popover" title="Nueva búsqueda.">Investigaciones</button> -->

                
        </div>   
        <!-- SE CREA EL MODAL CON LOS ITEMS DE BUSQUEDA PARA INVESTIGACION. Es el mismo modal de la pagina de inicio  -->
        <div class="modal fade" id="Investigacion" tabindex="-1" role="dialog" aria-labelledby="exampleModal" 
          aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 340px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal">Filtro de Investigaciones</h5>
                  <!-- BOTON PARA CERRAR MODAL MANUALMENTE -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="width: 310px;">
                  <form action="investigaciones.php" method="get" target="_SELF">
                    <div class="form-group">
                      <label for="busqueda1" class="col-form-label">Investigadores:</label><br>
                      <input style="width: 280px" type="text" class="form-input" id="busqueda1" name="busqueda1" 
                      placeholder="Investigador o nombre del proyecto.">
                      <br>
                      <hr>
                      <label for="busqueda2" class="col-form-label">Proyectos:</label>
                      
                      
                      <button class="btn btn-outline-secondary active" style="float: right; height: 30px; margin-top:8px;"
                          type="submit" formaction="todos_proyectos.php" formmethod="POST" >Todos</button><br>
                      
                      <input style="width: 280px" type="text" class="form-input" id="busqueda2" name="busqueda2" 
                      placeholder="Nombre del proyecto o año.">
                      <br>
                      <hr>
                      <label for="busqueda3" class="col-form-label">Grupos:</label>
                      <button type="submit" class="btn btn-outline-secondary active" style="float: right; height: 30px; margin-top:8px"
                      formaction="todos_grupos.php" formmethod="POST">Todos</button><br>
                      
                      <input style="width: 280px" type="text" class="form-input" id="busqueda3" name="busqueda3" 
                      placeholder="Nombre del grupo."><br><br>
                      <input type="submit" class="form-btn btn btn-success" style="width: 280px;" value="Buscar"/>
                    </div>                    
                  </form>
                </div>
              </div>
            </div>
          </div>
     
    
          <!-- SE CREA LA TABLA PARA MOSTRAR LOS RESULTADOS DE LA BUSQUEDA  -->
          <div class="tab-pane fadeshow active">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>NOMBRE DEL GRUPO</th>
                        <th>COORDINADOR</th>
                        <th>CORREO</th>
                        <th>CÓDIGO COLCIENCIAS</th>
                        <th>CLASIFICACIÓN COLCIENCIAS</th>
                        <th>RED O CONSORCIO</th>
                        <th>SEMILLEROS</th>
                      </tr>
                    </thead>
                    <!-- ABRO PHP PARA HACER EL QUERY E IMPRIMIR -->
                    <?php 
                        // COMO ' ES UN CARACTER DE ESCAPE PARA SQL, ENTONCES LO REEMPLAZO POR ''
                        
                        $sel = $conexion ->query("SELECT * FROM grupos_inv");
                        // sI HAY RESULTADOS IMPRIMO LA TABLA CON LOS DATOS CONSULTADOS
                        if($sel->num_rows > 0){
                            while($fila = $sel -> fetch_assoc()){
                                ?>
                                  <!-- Creo una tabla para mostrar los resultados de la busqueda -->
                                  <tbody>
                                    <tr>
                                      <!-- Empiezo a recorrer la primera fila de resultados y a mostrar en pantalla las columnas TIPO Y TITULO -->
                                      <td><?php echo $fila['GRUPO'];?></td> 
                                      <td><?php echo $fila['COORDINADOR'];?></td> 
                                      <td><?php echo $fila['CORREO'];?></td>
                                      <td><?php echo $fila['CODIGO'];?></td> 
                                      <td><?php echo $fila['CLASIFICACION'];?></td> 
                                      <td><?php echo $fila['RED'];?></td> 
                                      <td><?php echo $fila['SEMILLERO'];?></td>
                                      </tr>
                                    <?php } ?>  
                                   </tbody>
                        <!-- SI NO HAY RESULTADOS SEGUN LO CONSULTADO, SE LE INDICA AL USUARIO -->
                        <?php } else{ ?>
                            <h2 style="color: red;">No se encontró ningun resultado.</h2>
                        <?php } ?>
                  </table>
                </div>
            </div>




    
    
    <!-- PIE DE PAGINA  -->
    <footer class="footer-low">
      
      <div class="container">  
        <div class="row">
        <div class="col-md-6" >
          <address class="text-footer">
            <h5>Coordinación de Investigación Escuela de Idiomas</h5>
            <p>Oficina: 11-102</p>
            <p><span class="ion-ios-telephone-outline"></span>219 8797</p>
            <p>investigacionidiomas@udea.edu.co</p>
          </address>
        </div>
        <div class="col-md-6">
          <address class="text-footer">
            <h5>Biblioteca de Idiomas John Herbert Adams</h5>
            <p>Oficina: 12-127</p>
            <p><span class="ion-ios-telephone-outline"></span>219 5934</p>
            <p>bibliotecaidiomas@udea.edu.co</p>
          </address>
        </div>
        </div>
      </div>

    </footer>
    

  </body>
  
</html>
