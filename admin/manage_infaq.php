<?php
include 'db_connection.php';

$conn = OpenCon();

// Handle form submission for create and update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $id_jamaah = $_POST['id_jamaah'];
    $uang_masuk = $_POST['uang_masuk'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    if ($id) {
        // Update record
        $sql = "UPDATE infaq SET id_jamaah='$id_jamaah', uang_masuk='$uang_masuk', keterangan='$keterangan', tanggal='$tanggal' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Insert new record
        $sql = "INSERT INTO infaq (id_jamaah, uang_masuk, keterangan, tanggal)
                VALUES ('$id_jamaah', '$uang_masuk', '$keterangan', '$tanggal')";
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";

            // Insert into uang_masuk table
            $sql = "INSERT INTO uang_masuk (tanggal, keterangan, uang_masuk)
                    VALUES ('$tanggal', '$keterangan', '$uang_masuk')";
            mysqli_query($conn, $sql);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM infaq WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Fetch all records
$sql = "SELECT infaq.id, jamaah.nama_jamaah, jamaah.no_telp, infaq.uang_masuk, infaq.keterangan, infaq.tanggal
        FROM infaq
        JOIN jamaah ON infaq.id_jamaah = jamaah.id_jamaah";
$result = mysqli_query($conn, $sql);

CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Infaq</title>
</head>
<body>
    <h2>Manage Infaq</h2>
    
    <form method="POST" action="manage_infaq.php">
        <input type="hidden" name="id" id="id">
        <label for="id_jamaah">Jamaah:</label>
        <select name="id_jamaah" id="id_jamaah">
            <?php
            $conn = OpenCon();
            $jamaah_result = mysqli_query($conn, "SELECT id_jamaah, nama_jamaah FROM jamaah");
            while ($row = mysqli_fetch_assoc($jamaah_result)) {
                echo "<option value='" . $row['id_jamaah'] . "'>" . $row['nama_jamaah'] . "</option>";
            }
            CloseCon($conn);
            ?>
        </select><br>
        <label for="uang_masuk">Uang Masuk:</label>
        <input type="number" name="uang_masuk" id="uang_masuk"><br>
        <label for="keterangan">Keterangan:</label>
        <select name="keterangan" id="keterangan">
            <option value="OPERASIONAL MASJID">OPERASIONAL MASJID</option>
            <option value="GHARIN">GHARIN</option>
            <option value="KHATIB JUMAT">KHATIB JUMAT</option>
            <option value="MDTA">MDTA</option>
        </select><br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal"><br>
        <input type="submit" value="Submit">
    </form>

   </table>
</body>
</html>
