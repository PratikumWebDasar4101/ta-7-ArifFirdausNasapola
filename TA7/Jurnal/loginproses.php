
<?php 

require_once("db.php");
$nim 			= $_POST['nim'];
$nama 			= $_POST['nama'];
$jeniskelamin	= $_POST['jeniskelamin'];
$program 		= $_POST['program'];
$fakultas 		= $_POST['fakultas'];
$asal 			= $_POST['asal'];
$moto 			= $_POST['moto'];

$sql = "INSERT INTO mahasiswa(Nim, Nama, Jeniskelamin, Programstudi, Fakultas,Asal,Motohidup)
		VALUES ('$nim', '$nama', '$jeniskelamin', '$program', '$fakultas', '$asal', '$moto')";

if (mysqli_query($conn, $sql)) {
	echo "<center> New record created successfully </center>";

}else{

	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}		

mysqli_close($conn);
echo"<br>";
echo "<center> Silahkan klik <a href='tampilan.php'>link ini</a> untuk selanjutnya </center>";

?>