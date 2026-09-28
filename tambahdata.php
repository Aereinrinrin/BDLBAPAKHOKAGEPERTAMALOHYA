<?php
// 1. Connect to the database engine
$conn = mysqli_connect("localhost", "root", "", "db mhws");
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}

// 2. Process form submission when the button is clicked
if (isset($_POST['submit'])) {
    // Sanitize user inputs to prevent SQL injection issues
    $npm      = mysqli_real_escape_string($conn, $_POST['npm']);
    $nama     = mysqli_real_escape_string($conn, $_POST['nama_mahasiswa']);
    $jk       = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $prodi    = mysqli_real_escape_string($conn, $_POST['program_studi']);
    $angkatan = (int)$_POST['angkatan'];
    $agama    = mysqli_real_escape_string($conn, $_POST['agama']);

    // Query to inject new record into MySQL
    $query = "INSERT INTO mahasiswa (npm, nama_mahasiswa, jenis_kelamin, program_studi, angkatan, agama) 
              VALUES ('$npm', '$nama', '$jk', '$prodi', $angkatan, '$agama')";

    if (mysqli_query($conn, $query)) {
        // Redirect right back to the main list on success!
        header("Location: webdl.php");
        exit();
    } else {
        echo "Failed to add record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa - YoRHa Database</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; padding: 40px; }
        .card { background: white; max-width: 480px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h3 { text-align: center; color: #2c3e50; margin-top: 0; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-group { display: flex; gap: 10px; margin-top: 20px; }
        button { background-color: #27ae60; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; width: 100%; }
        button:hover { background-color: #219150; }
        .btn-cancel { background-color: #7f8c8d; text-align: center; text-decoration: none; color: white; padding: 10px 15px; border-radius: 4px; font-weight: bold; width: 100%; box-sizing: border-box; }
        .btn-cancel:hover { background-color: #636e72; }
    </style>
</head>
<body>

<div class="card">
    <h3>Tambah Mahasiswa Baru</h3>
    <form method="POST" action="tambahdata.php">
        <div class="form-group">
            <label>NPM</label>
            <input type="text" name="npm" placeholder="e.g., 25081010199" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_mahasiswa" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="L">Laki-laki (L)</option>
                <option value="P">Perempuan (P)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Program Studi</label>
            <select name="program_studi" required>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Sains Data">Sains Data</option>
                <option value="bisnis digital">Bisnis Digital</option>
            </select>
        </div>
        <div class="form-group">
            <label>Angkatan</label>
            <input type="number" name="angkatan" value="2025" required>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select name="agama" required>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
                <option value="Kepercayaan">Kepercayaan</option>
            </select>
        </div>
        <div class="btn-group">
            <a href="webdl.php" class="btn-cancel">Batal</a>
            <button type="submit" name="submit">Simpan Data</button>
        </div>
    </form>
</div>

</body>
</html>