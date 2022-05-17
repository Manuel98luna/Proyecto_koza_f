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
    <?php require_once "navbar.php" ?>
    <title>LOGIN</title>
</head>

<body>


<div class="shadow-lg p-3 mb-5 bg-body rounded">
<div class="d-flex justify-content-center"><table class="table table-bordered ">
  <thead>
    <tr class="table-primary">
      <th scope="col"><button class="btn " name="login" type="submit"><a href="new_users.php" class="btn btn-outline"><img src="img/inventario.png" width="50" height="30">Inventario</a></button></th>
      <th scope="col"><button class="btn " name="login" type="submit"><a href="new_users.php" class="btn btn-outline"><img src="img/compra.png" width="50" height="30">Compras</a></button></th>
      <th scope="col"><button class="btn " name="login" type="submit"><a href="new_users.php" class="btn btn-outline"><img src="img/factura.png" width="50" height="30">Facturacion</a></button></th>

    </tr>
  
  </tbody>
</table></div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>