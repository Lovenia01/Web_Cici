<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_buku'])) {
    $judul_buku = $_POST['judul_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $id_penulis = $_POST['id_penulis'];
    $query = "INSERT INTO Buku (judul_buku, tahun_terbit, id_penulis) VALUES ('$judul_buku', '$tahun_terbit', '$id_penulis')";
    mysqli_query($conn, $query);
    header("Location: buku.php");
}
$buku_result = mysqli_query($conn, 
    "SELECT Buku.judul_buku, Buku.tahun_terbit, Penulis.nama_penulis 
    FROM Buku JOIN Penulis ON Buku.id_penulis = Penulis.id_penulis");
$penulis_result = mysqli_query($conn, "SELECT * FROM Penulis");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Data Buku</h1>
    <form method="POST">
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" required><br>

        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required><br>

        <label>Penulis:</label>
        <select name="id_penulis" required>
            <option value="">Pilih Penulis</option>
            <?php
            while ($penulis = mysqli_fetch_assoc($penulis_result)) {
                echo "<option value='{$penulis['id_penulis']}'>{$penulis['nama_penulis']}</option>";
            }
            ?>
        </select><br>

        <button type="submit" name="tambah_buku">Tambah Buku</button>
    </form>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tahun Terbit</th>
            <th>Penulis</th>
        </tr>
        <?php
        $no = 1;
        while ($buku = mysqli_fetch_assoc($buku_result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$buku['judul_buku']}</td>
                    <td>{$buku['tahun_terbit']}</td>
                    <td>{$buku['nama_penulis']}</td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>