<?php include('config.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO kritik_saran (nama, email, nomor_hp, pesan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $nomor_hp, $pesan);

   if ($stmt->execute()) {
    echo "<script>
        alert('Data berhasil dimasukkan. Terima kasih atas masukan Anda!');
        window.location.href='../index.php'; // Mengarahkan ke index.php di folder htdocs
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
        window.location.href='../index.php'; // Mengarahkan ke index.php di folder htdocs
    </script>";
}
    $stmt->close();
    $conn->close();
}
?>
