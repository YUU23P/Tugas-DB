<html>
  <center>
  <h3>MENAMPILKAN ISI DATA <hr></h3>
  <table border="1">
      <tr><td>KODE BARANG<td>NAMA BARANG<td>HARGA<td>JUMLAH<td>SUPLIER
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
          echo "<tr>
                  <td>{$row['kdbarang']}</td>
                  <td>{$row['nmbarang']}</td>
                  <td>{$row['harga']}</td>
                  <td>{$row['jumlah']}</td>
                  <td>{$row['suplier']}</td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
  }
  
  $conn->close();
  ?>
  </table>
  </center>
  </html>
  