<?php
session_start();
include('config.php');
include_once 'class/pacientes.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Genero = $_POST['Genero'];
    $Edad = $_POST['Edad'];
    $Telefono = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];
    $Email = $_POST['Email'];

    //hace referencia a la funcion update
    if ($crud->update($id, $Nombre,$Apellido,$Genero,$Edad,$Telefono, $Direccion, $Email)) {
        $msg = "<b>WOW, Actualizacion exitosa!</b>";
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    extract($crud->getID($id));
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
    <?php require_once "menu.php" ?>
    <title>Pacientes</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <h3>ACTUALIZAR PACEINTES</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input id="Nombre" value="<?php echo $Nombre; ?>" class="form-control" type="text" name="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Apellido</label>
                        <input id="Apellido" value="<?php echo $Apellido; ?>" class="form-control" type="text" name="Apellido">
                    </div><br>
                    <div class="form-group">
                        <label for="Genero">Genero</label>
                        <input id="Genero" value="<?php echo $Genero; ?>" class="form-control" type="text" name="Genero">
                    </div><br>
                    <div class="form-group">
                        <label for="Edad">Edad</label>
                        <input id="Edad" value="<?php echo $Edad; ?>" class="form-control" type="text" name="Edad">
                    </div><br>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input id="Telefono" value="<?php echo $Telefono; ?>" class="form-control" type="text" name="Telefono">
                    </div><br>
                    <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input id="Direccion" value="<?php echo $Direccion; ?>" class="form-control" type="text" name="Direccion">
                    </div><br>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input id="Email" value="<?php echo $Email; ?>" class="form-control" type="text" name="Email">
                    </div><br>
                    <button class="btn btn-primary" name="btn-update" type="submit">Actualizar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>