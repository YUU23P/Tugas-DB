<!-- cari.php -->
<html>
  <h3>PENCARIAN DATA <hr></h3>

  <?php
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "tblbrg");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menangani pencarian berdasarkan input dari form
    if (isset($_GET['cari'])) {
        $cari = $conn->real_escape_string($_GET['cari']); // Menjaga keamanan input
        $sql = "SELECT * FROM tblbrg WHERE nmbarang LIKE '%$cari%' OR kdbarang LIKE '%$cari%'";
    } else {
        $sql = "SELECT * FROM tblbrg";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_row()) {
            list($kdbarang, $nmbarang, $harga, $jumlah, $suplier) = $row;
            echo "<table border='1'>";
            echo "<tr><td>Kode Barang</td><td>: $kdbarang</td></tr>";
            echo "<tr><td>Nama Barang</td><td>: $nmbarang</td></tr>";
            echo "<tr><td>Harga</td><td>: $harga</td></tr>";
            echo "<tr><td>Jumlah</td><td>: $jumlah</td></tr>";
            echo "<tr><td>Suplier</td><td>: $suplier</td></tr>";
            echo "</table><br>";
        }
    } else {
        echo "<p>Data Tidak Ditemukan</p>";
    }

    // Menutup koneksi
    $conn->close();
  ?>

</html>
