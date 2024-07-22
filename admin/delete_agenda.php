<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM agenda WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: read_agenda.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
