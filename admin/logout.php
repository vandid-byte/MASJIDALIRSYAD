<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
$_SESSION = array();

// Hapus cookie sesi jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hapus sesi
session_destroy();

// Redirect ke halaman index.php di folder admin setelah logout
header("../index.php"); // Pastikan path sesuai dengan struktur folder Anda
exit();
?>
