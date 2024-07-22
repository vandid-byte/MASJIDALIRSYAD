<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM keuangan WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: read_keuangan.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
