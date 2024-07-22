<?php
include 'db_connection.php'; // Include your database connection file

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Validate inputs
    if (empty($nama) || empty($alamat) || empty($no_telp)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    try {
        if ($action === 'update' && !empty($id)) {
            // Update existing record
            $stmt = $pdo->prepare("UPDATE jamaah SET nama = ?, alamat = ?, no_telp = ? WHERE id = ?");
            $stmt->execute([$nama, $alamat, $no_telp, $id]);
        } else {
            // Insert new record
            $stmt = $pdo->prepare("INSERT INTO jamaah (nama, alamat, no_telp) VALUES (?, ?, ?)");
            $stmt->execute([$nama, $alamat, $no_telp]);
        }
      echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>