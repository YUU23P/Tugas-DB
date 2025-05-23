<?php
$conn = new mysqli("localhost", "root", "", "tblbrg");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['kdbarang'])) {
    $kdbarang = $conn->real_escape_string($_GET['kdbarang']);

    $sql = "DELETE FROM tblbrg WHERE kdbarang='$kdbarang'";

    if ($conn->query($sql) === TRUE) {
        header("Location: viewsearch.php"); // arahkan kembali ke halaman list data
        exit();
    } else {
        echo "Error saat menghapus data: " . $conn->error;
    }
} else {
    echo "Kode barang tidak ditemukan.";
}

$conn->close();
?>
