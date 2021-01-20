<?php
include '../src/ServiceController.php';

$action = new ServiceController();
$invoices = $action->showAllServices();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            </li>
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
            <h3 class="text-center text-info">Add Service</h3>
            <form action=" " method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Въведете име"> <!--required-->
                </div>
                <div class="form-group">
                    <input type="number" name="price" class="form-control" placeholder="Въведете цена"> <!--required-->
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Въведете дата"> <!--required-->
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit" >

                </div>
        </div>
        <div class="col-md-8">
            <table class="table table-hover" id="data-table">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>


                <?php foreach ($invoices as $row) { ?>
                    <tr>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td><?= $row['creation_date']; ?></td>

                        <td>
                            <a href="#" class="badge badge-primary p-2">Details</a> |
                            <a href="delete.php?action=service&id=<?= $row['id']; ?>" class="badge badge-danger p-2">Delete</a>
<!--                            <a href="ServiceController.php?delete=--><?//= $row['id']; ?><!--" class="badge badge-danger p-2">Delete</a>-->
                            <a href="edit.php?id=<?= $row['id']; ?>" class="badge badge-success p-2" >Edit</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</ul>
</div>


</body>
</html>