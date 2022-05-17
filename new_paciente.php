<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
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
                <h3>Nuevo Paciente</h3>
                <hr>
                <form method="post" action="registroa.php">
                    <div class="form-group">
                        <label for="Nombre">Nombre:</label>
                        <input id="Nombre" class="form-control" type="text" name="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Apellido:</label>
                        <input id="Apellido" class="form-control" type="text" name="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="Genero">Genero:</label>
                        <input id="Genero" class="form-control" type="text" name="Genero">
                    </div>
                    <div class="form-group">
                        <label for="Edad">Edad:</label>
                        <input id="Edad" class="form-control" type="text" name="Edad">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono:</label>
                        <input id="Telefono" class="form-control" type="text" name="Telefono">
                    </div> <br>
                    <div class="form-group">
                        <label for="Direccion">Direccion:</label>
                        <input id="Direccion" class="form-control" type="text" name="Direccion">
                    </div> <br>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input id="Email" class="form-control" type="text" name="Email">
                    </div> <br>
                    <button class="btn btn-primary" name="registroa" type="submit" >Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>