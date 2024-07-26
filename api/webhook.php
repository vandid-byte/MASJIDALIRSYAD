<?php
    use Xendit\Invoice\InvoiceApi;
    include '../config.php';
    // include_once '../config/Database.php';
    // include_once '../models/Student.php';

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $apiInstance = new InvoiceApi();

        $getInvoice = $apiInstance->getInvoiceById($_REQUEST['id']);

        $paymentQuery = 'SELECT status FROM pembayaran WHERE external_id = ?';
        $stmt = $conn->prepare($paymentQuery);
        $stmt->bind_param('s', $_REQUEST['external_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $status = '';
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $status = $row['status'];
        }

        if($status === 'settled') {
            echo json_encode(array('message' => 'Payment has been already processed'));
        }

        $updateQuery = 'UPDATE pembayaran SET status = ? WHERE external_id = ?';
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('ss', strtolower($getInvoice['status']), $_REQUEST['external_id']);
        $stmt->execute();
        
        echo json_encode(array('message' => 'Success'));

    } else {
        echo json_encode(array('message' => "Error: incorrect Method!"));
    }