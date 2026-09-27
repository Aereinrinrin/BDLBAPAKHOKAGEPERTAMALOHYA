<?php
// config
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db mhws";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error" . mysqli_connect_error());
}

// AMBIL DATA
$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa FASILKOM Angkatan 2025</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; color: #333; }
        h2 { text-align: center; margin-top: 30px; }
        table { border-collapse: collapse; width: 90%; margin: 20px auto; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2c3e50; color: #ecf0f1; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

<h2>Daftar Mahasiswa FASILKOM</h2>

<table>
    <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama Lengkap</th>
        <th>L/P</th>
        <th>Program Studi</th>
        <th>Angkatan</th>
        <th>Agama</th>
    </tr>

    <?php
    // loop data. print html
    if (mysqli_num_rows($result) > 0) {
        $no = 1; // jumlah baris
        
        // ambil data + baris
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row["npm"] . "</td>";
            echo "<td>" . $row["nama_mahasiswa"] . "</td>";
            echo "<td>" . $row["jenis_kelamin"] . "</td>";
            echo "<td>" . $row["program_studi"] . "</td>";
            echo "<td>" . $row["angkatan"] . "</td>";
            echo "<td>" . $row["agama"] . "</td>";
            echo "</tr>";
        }
    } else {
        // klo kosong
        echo "<tr><td colspan='7' style='text-align:center;'>data kosong. diisi bos</td></tr>";
    }

    mysqli_close($conn);
    ?>
</table>

</body>
</html>