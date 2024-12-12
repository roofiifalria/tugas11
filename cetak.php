<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM siswa WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Detail Siswa</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?= $row['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $row['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= $row['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><?= $row['agama'] ?></td>
                    </tr>
                    <tr>
                        <th>Sekolah Asal</th>
                        <td><?= $row['sekolah_asal'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="mt-3 no-print">
            <button onclick="window.print()" class="btn btn-primary">Cetak</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>
