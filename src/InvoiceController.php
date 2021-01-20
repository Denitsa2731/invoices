<?php
include 'Entity.php';

class InvoiceController extends Entity {
    private $stm;

    function __construct()
    {
        $this->stm = $this->connect();
    }

    public function getAllClientNames()
    {
        $clientNames = [];
        $stmt = $this->stm->query("SELECT client_name FROM invoices.client ORDER BY id DESC");

        while ($row = $stmt->fetch()) {
            array_push($clientNames, $row['client_name']);
        }

        return $clientNames;
    }

    public function addInvoice($client_name, $number, $date)
    {
        $stmt = $this->stm->prepare("INSERT INTO invoices.invoice(client_name, date, number) VALUES (?, ?, ?)");
        return $stmt->execute([$client_name, $date, $number]);
    }

    public function showAllInvoices()
    {
        $invoices = [];
        $stmt = $this->stm->query("SELECT * FROM invoices.invoice ORDER BY id DESC");

        while ($row = $stmt->fetch()) {
            array_push($invoices, array(
                'id' => $row['id'],
                'name' => $row['client_name'],
                'date' => $row['date'],
                'number' => $row['number'],
            ));
        }

        return $invoices;
    }
    public function getInvoiceById(int $id)
    {
        $stmt = $this->stm->prepare("SELECT * FROM invoices.invoice WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function updateInvoice(array $data)
    {
        $stmt = $this->stm->prepare("UPDATE invoices.invoice SET client_name=?, number=?, date=? WHERE id=?");

        return $stmt->execute([$data['name'], $data['number'], $data['creation_date'], $data['id']]);
    }


    public function deleteInvoice(int $id)
    {
        $stmt = $this->stm->prepare("DELETE FROM invoices.invoice WHERE id=?");
        return $stmt->execute([$id]);
    }
}

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit'])) {
    // get variables from the form
    $client_name = $_POST['name'];
    $number = $_POST['number'];
    $date = $_POST['date'];

    $actions = new InvoiceController();
    $res = $actions->addInvoice($client_name, $number, $date);

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
    $data['number'] = $_POST['number'];
    $data['creation_date'] = $_POST['date'];

    $actions = new InvoiceController();
    $res = $actions->updateInvoice($data);

    header('location:add.php');
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $actions = new InvoiceController();
    $res = $actions->deleteInvoice($id);

    header('location:../templates/add.php');
}

