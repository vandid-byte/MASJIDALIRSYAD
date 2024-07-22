<?php
// Include the database connection file
include('db_connect.php');

try {
    // SQL query to select data from the view
    $query = "SELECT id_inventaris, nama_barang, satuan, uang_keluar, total_uang_keluar_satuan FROM laporan_uang_keluar_inventaris";
    $stmt = $pdo->query($query);
    
    // Initialize total accumulator
    $totalUangKeluarSatuan = 0;

    // Fetch and display the data
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr><th>ID Inventaris</th><th>Nama Barang</th><th>Satuan</th><th>Uang Keluar</th><th>Total Uang Keluar Satuan</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Accumulate total
        $totalUangKeluarSatuan += $row['total_uang_keluar_satuan'];

        // Display row
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id_inventaris']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_barang']) . "</td>";
        echo "<td>" . htmlspecialchars($row['satuan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['uang_keluar']) . "</td>";
        echo "<td>" . htmlspecialchars($row['total_uang_keluar_satuan']) . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr><td colspan='4'>Total</td><td>" . number_format($totalUangKeluarSatuan, 2) . "</td></tr>";
    echo "</tfoot>";
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;
?>
