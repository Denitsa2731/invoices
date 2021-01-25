<?php
include '../src/InvoiceController.php';

$actions = new InvoiceController();
$invoice = $actions->getInvoiceById($_GET['id']);
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


<div class="col-md-4">
    <h3 class="text-center text-info">Edit Invoice</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="id" class="form-control" value="<?= $invoice['id']; ?>" hidden> <!--required-->
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Въведете име" value="<?= $invoice['client_name']; ?>"> <!--required-->
        </div>
        <div class="form-group">
            <input type="number" name="number" class="form-control" placeholder="Въведете номер" value="<?= $invoice['number']; ?>"> <!--required-->
        </div>
        <div class="form-group">
            <input type="date" name="date" class="form-control" placeholder="Въведете дата" value="<?= $invoice['date']; ?>"> <!--required-->
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Въведете email" required>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Въведете адрес" required>
        </div>
        <div class="form-group">
            <input type="date" name="date" class="form-control" placeholder="Въведете дата на създаване" required>
        </div>
        <div class="form-group">
            <input type="submit" name="update" class="btn btn-primary btn-block" value="Update" >
        </div>
</div>
</body>

</html>
