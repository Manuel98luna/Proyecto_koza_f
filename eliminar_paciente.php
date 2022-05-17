<?php
include_once 'config.php';
include_once 'class/pacientes.php';
$crud = new crud($conn);
if (isset($_POST['btn-del'])) {
    $id = $_GET['delete_id'];
    $crud->delete($id);
    header("Location:eliminar_paciente.php?alerta");
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <?php require_once "navbar.php" ?>
  <title>Eliminar</title>
</head>

<body style="background-color:#7F8C8D">

  <div class="container"><br>

  <?php
        if (isset($_GET['alerta'])) {
        ?>
            <div class="alert alert-success">
                <strong>Hecho!</strong> Usuario Eliminado Correcctamente!
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger">
                <strong>Alerta!</strong> Esta Seguro que requiere Eliminar estas filas
            </div>
        <?php
        }
        ?>
  <?php
  if(isset($_GET['delete_id'])){
      
  ?>
    <div class="row justify-content-center">
      <div class="col-8 p-7 bg-white shadow-lg rounded">
        <h3>Eliminacion</h3>
        <table class="table table-light">
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Genero</td>
                    <td>Edad</td>
                    <td>Telefono</td>
                    <td>Direccion</td>
                    <td>Email</td>v
                


                </tr>
                <?php 
                $stmt = $conn->prepare("SELECT * FROM pacientes WHERE id=:id");
                $stmt->execute(array(":id" => $_GET['delete_id']));
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                ?>
                <tr>
                    <td>
                      <?php echo ($row['id']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Nombre']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Apellido']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Genero']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Edad']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Telefono']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Direccion']) ?>
                    </td>
                    <td>
                      <?php echo ($row['Email']) ?>
                    </td>
                </tr>
                <?php
                }
          ?>
            </tbody>
            
        </table>

        
        <?php
           }
          ?>
          

<div class="container">
        <p>
            <?php
            if (isset($_GET['delete_id'])) {
            ?>
        <form method="post">
        
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
            <a href="admin_pacientes.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
        </form>
    <?php
            } else {
    ?>
        <a href="admin_pacientes.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>REGRESAR</a>
    <?php
            }
    ?>
    </p>
    </div>
    </div>
    </div>
    
  

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>