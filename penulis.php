<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_penulis'])) {
    $nama_penulis = $_POST['nama_penulis'];
    $query = "INSERT INTO Penulis (nama_penulis) VALUES ('$nama_penulis')";
    mysqli_query($conn, $query);
    header("Location: penulis.php");
}
$result = mysqli_query($conn, "SELECT * FROM Penulis");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Data Penulis</h1>
    <form method="POST">
        <label>Nama Penulis:</label>
        <input type="text" name="nama_penulis" required>
        <button type="submit" name="tambah_penulis">Tambah Penulis</button>
    </form>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Penulis</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_penulis']}</td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
