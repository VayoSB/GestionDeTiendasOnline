<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    $message = "";
    if(count($_POST) > 0) {
        $db=Db::getConnect();
        $con = mysqli_connect('localhost','root','','tienda') or die('No es posible conectar a la bd.');      
        $result = mysqli_query($con,"SELECT * FROM usuario WHERE nombre_usuario = '". $_POST["nombre_usuario"] . "' and password = '". $_POST['password'] ."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["id_usuario"] = $row['id_usuario'];
            $_SESSION["nombre"] = $row['nombre'];
        } else {
            require_once('Views/Errores/errorLogin.php');
        }
    }
    if(isset($_SESSION["id_usuario"])) {
        require_once('Views/bienvenido.php');
    }else{
?>

<html>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <img style="width: 12%;" src="../TiendaBootstrap/images/LogoGetio.png">
        </div>
    </nav>
  <div class="card container mt-3 w-50">
  <h2 class="align-self-center p-2" style="color:#195176;">Inicio de Sesión</h2>
  
  <!-- Formulario de registro -->
  <form name="frmUser" method="post" action="" align="center">
    <label for="text" class="float-left"><b>Usuario:</b></label>
    <input type="text" class="form-control" id="nombre_usuario" placeholder="Ingrese su usuario" 
        name="nombre_usuario">
        
    <label for="text" class="float-left"><b>Contraseña:</b></label>
    <input type="password" name="password" class="form-control mb-3" placeholder="Ingrese su contraseña">
             
    <button type="submit" name="submit" value="Submit" class="btn btn-outline-primary mb-3">Iniciar Sesión</button>
  </form>  
  </div>
</html>

<?php
    }
?>