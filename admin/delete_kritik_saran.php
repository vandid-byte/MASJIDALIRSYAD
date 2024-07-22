<?php
include('config.php'); // Pastikan file config.php berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap ID dari form
    $id = intval($_POST['id']); // Menggunakan intval untuk memastikan ID adalah integer

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM kritik_saran WHERE id = ?";
    
    // Siapkan statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter
        $stmt->bind_param("i", $id);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("Location: read_kritik_saran.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    // Jika bukan POST request, redirect ke halaman utama
    header("Location: read_kritik_saran.php");
    exit();
}
?>
