<?php
include '../config.php';

use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\XenditSdkException;
use Ramsey\Uuid\Uuid;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $apiInstance = new InvoiceApi();
    $data = json_decode(file_get_contents("php://input"));
    $create_invoice_request  = new CreateInvoiceRequest([
        'external_id' => strval(Uuid::uuid1()),
        'payer_email' => $_REQUEST['email'] ?? $data->email,
        'description' => $_REQUEST['keterangan'] ?? $data->keterangan,
        'amount' => $_REQUEST['jumlah'] ?? $data->jumlah,
        // 'redirect_url' => 
        'currency' => 'IDR',
    ]);

    try {
        $result = $apiInstance->createInvoice($create_invoice_request);
        $paymentUrl = $result['invoice_url']; //link yang harus dikirim lewat Whatsapp
        $cleanString = str_replace("\\", "", $paymentUrl);

        //save ke database
        $sql = "INSERT INTO pembayaran (checkout_link, external_id, status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $status = 'pending';
        $stmt->bind_param("sss", $cleanString, $create_invoice_request['external_id'], $status);

        echo json_encode(array('data' => $cleanString));
    
    } catch (XenditSdkException $e) {
        // echo 'Exception when calling InvoiceApi->createInvoice: ', $e->getMessage(), PHP_EOL;
        // echo 'Full Error: ', json_encode($e->getFullError()), PHP_EOL;
        echo json_encode(array('message' => $e->getMessage(), "errors" => $e->getFullError())), PHP_EOL;
    }
}
?>