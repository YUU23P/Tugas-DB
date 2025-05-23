<html>
  <center>
  <h3>MENAMPILKAN ISI DATA <hr></h3>
  <table border="1" cellpadding="8" cellspacing="0">
      <tr>
        <th>KODE BARANG</th>
        <th>NAMA BARANG</th>
        <th>HARGA</th>
        <th>JUMLAH</th>
        <th>SUPLIER</th>
        <th>AKSI</th>
      </tr>
  <?php
  $conn = new mysqli("localhost", "root", "", "tblbrg");

  // Cek koneksi
  if ($conn->connect_error) {
      die("Koneksi gagal: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM tblbrg";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // Output setiap baris data
      while($row = $result->fetch_assoc()) {
          $kdbarang = urlencode($row['kdbarang']); // supaya aman untuk URL
          echo "<tr>
                  <td>{$row['kdbarang']}</td>
                  <td>{$row['nmbarang']}</td>
                  <td>{$row['harga']}</td>
                  <td>{$row['jumlah']}</td>
                  <td>{$row['suplier']}</td>
                  <td>
                    <a href='edit.php?kdbarang=$kdbarang'>Edit</a> | 
                    <a href='hapus.php?kdbarang=$kdbarang' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                  </td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
  }
  
  $conn->close();
  ?>
  </table>
  </center>
</html>
    