<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "tblbrg");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dan amankan
    $kdbarang = $_POST['kdbarang'] ?? '';
    $nmbarang = $_POST['nmbarang'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    $suplier = $_POST['suplier'] ?? '';

    // Siapkan query prepared statement untuk insert
    $stmt = $conn->prepare("INSERT INTO tblbrg (kdbarang, nmbarang, harga, jumlah, suplier) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdds", $kdbarang, $nmbarang, $harga, $jumlah, $suplier);
    // Note: tipe data: s=string, d=double (float), i=integer

    ?>
    <html>
    <head><title>Insert Result</title></head>
    <body>
    <h1>Insert Result</h1>
    <br><br>
    <?php

    if ($stmt->execute()) {
        // Tampilkan hasil yang dimasukkan, dengan htmlspecialchars untuk keamanan XSS
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td>Kode Barang</td><td>: " . htmlspecialchars($kdbarang) . "</td></tr>";
        echo "<tr><td>Nama Barang</td><td>: " . htmlspecialchars($nmbarang) . "</td></tr>";
        echo "<tr><td>Harga</td><td>: " . htmlspecialchars($harga) . "</td></tr>";
        echo "<tr><td>Jumlah</td><td>: " . htmlspecialchars($jumlah) . "</td></tr>";
        echo "<tr><td>Suplier</td><td>: " . htmlspecialchars($suplier) . "</td></tr>";
        echo "</table>";
        echo "<br><b>Simpan Data Success ...!</b>";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    ?>
    </body>
    </html>
    <?php
} else {
    // Jika diakses tanpa POST, redirect atau tampilkan pesan
    echo "Akses langsung tidak diperbolehkan.";
}
?>
