<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM jamaah WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $jamaah = $result->fetch_assoc();
    echo json_encode($jamaah);

    $stmt->close();
    $conn->close();
}
?>
