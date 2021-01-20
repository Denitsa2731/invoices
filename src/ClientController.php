<?php
include 'Entity.php';

class ClientController extends Entity
{
    private $stm;

    function __construct()
    {
        $this->stm = $this->connect();
    }

    public function addClient($client_name, $client_email, $client_address, $creation_date)
    {
        $stmt = $this->stm->prepare("INSERT INTO invoices.client(client_name, client_email, client_address, creation_date) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$client_name, $client_email, $client_address, $creation_date]);
    }

    public function showAllClient()
    {
        $invoices = [];
        $stmt = $this->stm->query("SELECT * FROM invoices.client ORDER BY id DESC");

        while ($row = $stmt->fetch()) {
            array_push($invoices, array(
                'id' => $row['id'],
                'name' => $row['client_name'],
                'email' => $row['client_email'],
                'date' => $row['creation_date'],
            ));
        }

        return $invoices;
    }
    public function getClientById(int $id)
    {
        $stmt = $this->stm->prepare("SELECT * FROM invoices.client WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function updateClient(array $data)
    {
        $stmt = $this->stm->prepare("UPDATE invoices.client SET client_name=?, client_email=?, client_address=?, creation_date=? WHERE id=?");

        return $stmt->execute([$data['name'], $data['client_email'], $data['client_address'], $data['creation_date'], $data['id']]);
    }

    public function deleteClient(int $id)
    {
        $stmt = $this->stm->prepare("DELETE FROM invoices.client WHERE id=?");
        return $stmt->execute([$id]);
    }
}

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit'])) {
    // get variables from the form
    $client_name = $_POST['name'];
    $client_email = $_POST['email'];
    $client_address = $_POST['address'];
    $creation_date = $_POST['date'];

    $actions = new ClientController();
    $res = $actions->addClient($client_name, $client_email, $client_address, $creation_date);

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
    $data['client_email'] = $_POST['email'];
    $data['client_address'] = $_POST['address'];
    $data['creation_date'] = $_POST['date'];

    $actions = new ClientController();
    $res = $actions->updateClient($data);

    header('location:clients.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $actions = new ClientController();
    $res = $actions->deleteClient($id);

    header('location:../templates/clients.php');
}
