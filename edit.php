<?php
$conn = new mysqli("localhost", "root", "", "tblbrg");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_GET['kdbarang'])) {
    die("Kode barang tidak ditemukan.");
}

$kdbarang = $conn->real_escape_string($_GET['kdbarang']);

// Proses hapus data jika ada parameter hapus=1
if (isset($_GET['hapus']) && $_GET['hapus'] == '1') {
    $sql = "DELETE FROM tblbrg WHERE kdbarang='$kdbarang'";
    if ($conn->query($sql) === TRUE) {
        header("Location: viewsearch.php"); // arahkan ke halaman list data setelah hapus
        exit();
    } else {
        echo "Error saat menghapus data: " . $conn->error;
    }
    $conn->close();
    exit();
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nmbarang = $conn->real_escape_string($_POST['nmbarang']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $jumlah = $conn->real_escape_string($_POST['jumlah']);
    $suplier = $conn->real_escape_string($_POST['suplier']);

    $sql = "UPDATE tblbrg SET nmbarang='$nmbarang', harga='$harga', jumlah='$jumlah', suplier='$suplier' WHERE kdbarang='$kdbarang'";

    if ($conn->query($sql) === TRUE) {
        header("Location: viewsearch.php"); // arahkan ke halaman list data setelah update
        exit();
    } else {
        echo "Error update data: " . $conn->error;
    }
} else {
    // Ambil data lama untuk ditampilkan di form
    $result = $conn->query("SELECT * FROM tblbrg WHERE kdbarang='$kdbarang'");
    if ($result->num_rows == 0) {
        die("Data tidak ditemukan.");
    }
    $row = $result->fetch_assoc();
    ?>

    <html>
    <head><title>Edit Data</title></head>
    <body>
    <center>
        <h3>Edit Data Barang</h3>
        <form method="POST" action="">
            <table>
                <tr><td>Kode Barang</td><td>: <?php echo htmlspecialchars($row['kdbarang']); ?></td></tr>
                <tr><td>Nama Barang</td><td>: <input type="text" name="nmbarang" value="<?php echo htmlspecialchars($row['nmbarang']); ?>"></td></tr>
                <tr><td>Harga</td><td>: <input type="text" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>"></td></tr>
                <tr><td>Jumlah</td><td>: <input type="text" name="jumlah" value="<?php echo htmlspecialchars($row['jumlah']); ?>"></td></tr>
                <tr><td>Suplier</td><td>: <input type="text" name="suplier" value="<?php echo htmlspecialchars($row['suplier']); ?>"></td></tr>
            </table>
            <input type="submit" value="Update">
            <a href="viewsearch.php">Batal</a> |
            <a href="?kdbarang=<?php echo urlencode($kdbarang); ?>&hapus=1" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
        </form>
    </center>
    </body>
    </html>

    <?php
}

$conn->close();
?>
