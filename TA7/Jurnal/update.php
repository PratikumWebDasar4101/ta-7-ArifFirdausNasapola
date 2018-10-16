<?php
  require_once('db.php');
 if (isset($_GET['nim'])) {
  $nim = $_GET['nim'];
  $sqlInsert = "SELECT * FROM mahasiswa where Nim = $nim";
  $result = $conn->query($sqlInsert);
  $row = $result->FETCH_ASSOC();
?>
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Edit Data</title>
        </head>
        <body>
          <form method="POST">
            <table align="center">
              <tr>
                <td colspan="3" align="center"><h2>Edit Data Anda</h2></td>
              </tr>
              <tr>
                <td>Nim</td>
                <td><input type="text" name="nama" value="<?php echo $row['Nim']; ?>" > </td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input type="text" name="nim" value="<?php echo $row['Nama']; ?>" ></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><input type="radio" name="jeniskelamin" <?php if ($row['Jeniskelamin'] == 'Laki-Laki' ) {
                      echo "checked";} ?> value="Laki-Laki">Laki-Laki
                    <input type="radio" name="jeniskelamin" <?php if ($row['Jeniskelamin'] == 'perempuan' ) {
                          echo "checked";} ?> value="perempuan">Perempuan </td>
              </tr>
              <tr>
                <td>Program Studi</td>
                <td><select>
                    <option <?php if ($row['Programstudi'] == 'D3 Manajemen Informatika') {
                      echo "checked";
                    } ?> value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
                    <option <?php if ($row['Programstudi'] == 'D3 Manajemen Informatika') {
                      echo "checked";
                    } ?> value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                    <option <?php if ($row['Programstudi'] =='S1 Sistem Informasi') {
                      echo "checked";
                    } ?> value="S1 Desain Komunikasi Visual">S1 Komunikasi Visual</option>
                    <option <?php if ($row['Programstudi'] =='S1 Komunikasi Visual') {
                      echo "checked";
                    } ?> value="S1 Teknik Perkapalan">S1 Teknik Perkapalan</option>
                    <option <?php if ($row['Programstudi'] =='S1 Teknik Perkapalan') {
                      echo "checked";
                    } ?> value="S1 Akuntansi">S1 Akuntansi</option>
                    <option <?php if ($row['Programstudi'] =='S1 Akuntansi') {
                      echo "checked";
                    } ?> value="S1 Akuntansi">S1 Akuntansi</option>
                </select></td>
              </tr>
              <tr>
                <td>Fakultas</td>
                <td><select name="fakultas">
                  <option <?php if ($row['Fakultas'] == 'Fakultas rekayasa industri') { echo "checked";} ?> value="Fakultas rekayasa industri">Fakultas Rekayasa Industri</option>
                  <option <?php if ($row['Fakultas'] == 'Fakultas ilmu terapan') { echo "checked";} ?> value="Fakultas ilmu terapan">Fakultas Ilmu Terapan</option>
                  <option <?php if ($row['Fakultas'] == 'Fakultas hukum') { echo "checked";} ?> value="Fakultas hukum">Fakultas Hukum</option>
                  <option <?php if ($row['Fakultas'] == 'Fakultas teknik') { echo "checked";} ?> value="Fakultas teknik">Fakultas Teknik</option>
                </select></td>
              </tr>
              <tr>
                <td>Asal</td>
                <td><input type="text" value="<?php echo $row['Asal'];?>" name="asal"></td>
              </tr>
              <tr>
                <td>Motto Hidup</td>
                <td><textarea name="moto"  ><?php echo $row['Motohidup'];?></textarea></td>
              </tr>
              <tr>
                <td><input type="submit" name="" value="submit"> </td>
              </tr>
            </table>
          </form>
        </body>
      </html>
      <?php
  }
      ?>
      <?php
      if (isset($_POST['nim'])) {
       $nim       = $_POST['nim'];
       $nama       = $_POST['nama'];
       $jeniskelamin = $_POST['jeniskelamin'];
       $program    = $_POST['program'];
       $fakultas     = $_POST['fakultas'];
       $asal       = $_POST['asal'];
       $moto       = $_POST['moto'];
         $sql = "UPDATE mahasiswa set
                        Nama ='$nama',
                        Nim = '$nim',
                        Jeniskelamin = '$jeniskelamin',
                        Programstudi = '$program',
                        Fakultas = '$fakultas',
                        Asal = '$asal',
                        Motohidup = '$moto'
              WHERE Nim = '$nim'";
      $resultupdt = $conn->query($sql);
      if ($resultupdt) {
        header("location: tampilan.php");
      }else {
        echo "gagal" .$conn->error;
      }
      }
      ?>