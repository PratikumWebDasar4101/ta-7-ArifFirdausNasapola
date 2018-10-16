<?php

require_once("db.php");
?>
<!DOCTYPE html>
<head>
    <title>Tampilan</title>
</head>
<body>
    <table border= "2" align="center">
        <tr>
            <td colspan="3" align="center"><b> KALTARA CERDAS </b></td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <form action="tampilan.php" method="GET">
                    <input type="hidden" name="aksi" value="search">
                    <input type="text" name="datamahasiswa">
                    <input type="submit" value="Search">
                </form>
            </td>
        </tr>
        <?php  
            if(isset($_GET['aksi']) && $_GET['aksi'] == 'search' && isset($_GET['datamahasiswa'])){
                $datamahasiswa      = $_GET['datamahasiswa'];
                $query              = "SELECT `Nim`, `Nama` FROM `mahasiswa` WHERE `Nim` LIKE '%$datamahasiswa%' OR 'Nama' LIKE '%$datamahasiswa%'";
            }else{
                $query              = "SELECT * FROM `mahasiswa`";
            }
        ?>
         <tr>
            <th>Nim</th>
            <th>Nama</th>
        </tr>

       <?php
            $result = mysqli_query($conn, $query);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["Nim"];
                    echo "<td>" . $row["Nim"] . "</td>";
                    echo "<td>" . $row["Nama"] . "</td>";
                    echo "<td>" . "<a href ='update.php?nim=$id'>Edit</a>| |<a href ='delete.php?nim=$id'>Hapus</a> </td>";
                    echo "</tr>";
                }

            }else {
                echo "<tr><td colspan='4' align='center'>0 results.</td></tr>";
            }
        ?>
    </table>
</body>
</html>