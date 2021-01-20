<?php
include '../src/ServiceController.php';

$actions = new ServiceController();
$service = $actions->getServiceById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en"><html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoices System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="../public/index.php">Invoice System</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links-->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="clients.php">Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="service.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Invoices</a>
            </li></ul>
    </div>
</nav>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
        </div>
    </div>
    <div class="row">


    <div class="col-md-4">
            <h3 class="text-center text-info">Edit Service</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="id" class="form-control" value="<?= $service['id']; ?>" hidden> <!--required-->
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Въведете име" value="<?= $service['name']; ?>"> <!--required-->
                </div>
                <div class="form-group">
                    <input type="number" name="price" class="form-control" placeholder="Въведете цена" value="<?= $service['price']; ?>"> <!--required-->
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Въведете дата" value="<?= $service['creation_date']; ?>"> <!--required-->
                </div>
                <div class="form-group">
                    <input type="submit" name="update" class="btn btn-primary btn-block" value="Update" >
                </div></form>
        </div>
</body>

</html>