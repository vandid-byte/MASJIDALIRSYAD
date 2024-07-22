<?php
include 'db_connection.php';

$conn = OpenCon();

$sql = "SELECT * FROM laporan_keuangan";
$result = mysqli_query($conn, $sql);

echo "<h2>Laporan Keuangan Masjid Al Irsyad</h2>";
echo "<table border='1'>
<tr>
<th>Tanggal</th>
<th>Keterangan</th>
<th>Uang Masuk</th>
<th>Uang Keluar</th>
<th>Sisa Saldo</th>
</tr>";

$sisa_saldo = 0;

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $sisa_saldo += $row["uang_masuk"] - $row["uang_keluar"];
        echo "<tr>";
        echo "<td>" . $row["tanggal"] . "</td>";
        echo "<td>" . $row["keterangan"] . "</td>";
        echo "<td>" . $row["uang_masuk"] . "</td>";
        echo "<td>" . $row["uang_keluar"] . "</td>";
        echo "<td>" . $sisa_saldo . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No results found</td></tr>";
}

echo "</table>";

CloseCon($conn);
?>
