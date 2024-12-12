<?php
require 'config.php';

// Ambil data siswa yang akan diedit
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM siswa WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);
    $sekolah_asal = mysqli_real_escape_string($conn, $_POST['sekolah_asal']);

    $query = "UPDATE siswa SET 
              nama='$nama', 
              alamat='$alamat', 
              jenis_kelamin='$jenis_kelamin', 
              agama='$agama', 
              sekolah_asal='$sekolah_asal' 
              WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data Siswa</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $row['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" required><?= $row['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Agama</label>
                <select class="form-select" name="agama" required>
                    <option value="Islam" <?= $row['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= $row['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                    <option value="Hindu" <?= $row['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                    <option value="Buddha" <?= $row['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                    <option value="Lainnya" <?= $row['agama'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Sekolah Asal</label>
                <input type="text" class="form-control" name="sekolah_asal" value="<?= $row['sekolah_asal'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
