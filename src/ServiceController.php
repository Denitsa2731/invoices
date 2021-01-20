<?php
include 'Entity.php';

class ServiceController extends Entity
{
    private $stm;

    function __construct()
    {
        $this->stm = $this->connect();
    }

    public function addService($name, $price, $creation_date)
    {
        $stmt = $this->stm->prepare("INSERT INTO invoices.service(name, price, creation_date) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $price, $creation_date]);
    }

    public function showAllServices()
    {
        $invoices = [];
        $stmt = $this->stm->query("SELECT * FROM invoices.service ORDER BY id DESC");

        while ($row = $stmt->fetch()) {
            array_push($invoices, array(
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'creation_date' => $row['creation_date'],
            ));
        }

        return $invoices;
    }

    public function getServiceById(int $id)
    {
        $stmt = $this->stm->prepare("SELECT * FROM invoices.service WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function updateService(array $data)
    {
        $stmt = $this->stm->prepare("UPDATE invoices.service SET name=?, price=?, creation_date=? WHERE id=?");

        return $stmt->execute([$data['name'], $data['price'], $data['creation_date'], $data['id']]);
    }

    public function deleteClient(int $id)
    {
        $stmt = $this->stm->prepare("DELETE FROM invoices.service WHERE id=?");
        return $stmt->execute([$id]);
    }
}

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit'])) {
    // get variables from the form
    $name = $_POST['name'];
    $price = $_POST['price'];
    $creation_date = $_POST['date'];

    var_dump($creation_date);

    $actions = new ServiceController();
    $res = $actions->addService($name, $price, $creation_date);

    if ($res) {
        echo "New record created successfully.";
    } else {
        echo "Error:" . $res;
    }
}

if (isset($_POST['update'])) {
    // get variables from the form
    $data['id'] = $_POST['id'];
    $data['name'] = $_POST['name'];
    $data['price'] = $_POST['price'];
    $data['creation_date'] = $_POST['date'];

    $actions = new ServiceController();
    $res = $actions->updateService($data);

    header('location:service.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $actions = new ServiceController();
    $res = $actions->deleteClient($id);

    header('location:../templates/service.php');
}