<?php
// 1. Establish the connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db mhws";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) { die("Data link severed! Error: " . mysqli_connect_error()); }

// 2. Capture the Filter Request
$filter_prodi = isset($_GET['prodi']) ? $_GET['prodi'] : '';

$where_sql = "";
if ($filter_prodi != "") {
    $safe_prodi = mysqli_real_escape_string($conn, $filter_prodi);
    $where_sql = " WHERE program_studi = '$safe_prodi' ";
}

// 3. Set up Pagination Variables
$limit = 25; // Maximum students per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$offset = ($page - 1) * $limit; 

// 4. Calculate Total Pages
$count_sql = "SELECT COUNT(*) AS total FROM mahasiswa" . $where_sql;
$count_result = mysqli_query($conn, $count_sql);
$count_row = mysqli_fetch_assoc($count_result);
$total_records = $count_row['total'];
$total_pages = ceil($total_records / $limit); 

// 5. Final Data Extraction Query
$sql = "SELECT * FROM mahasiswa" . $where_sql . " LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Classified</title>
    <style>
        @font-face {
            font-family: 'La Obrige';
            src: url('La Obrige.otf') format('opentype');
        }

        /* Global Reset & Background */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('bekgronlohya.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 20px;
            color: #2c3e50;
        }

       /* Main Dashboard Card Wrapper - Translucent Glass Effect */
.container {
    max-width: 1100px;
    margin: 20px auto;
    
    /* RGB = Pure White (255,255,255), A = 0.65 (65% opacity / 35% transparent) */
    background-color: rgba(255, 255, 255, 0.65);
    
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    
    /* Frosted Glass Effect: Softly blurs whatever background image is behind it! */
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.4);
}
        /* Page Header Title */
        h2 {
            font-family: 'La Obrige', serif;
            font-size: 2.5rem;
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            color: #1a252f;
            letter-spacing: 1px;
        }

        /* Controls Toolbar */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .controls form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .controls select, .controls button {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .controls button[type="submit"] {
            background-color: #34495e;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

       /* Table Design - Semi-Transparent Body */
table {
    width: 100%;                  
    border-collapse: collapse;    
    margin-top: 10px;
    
    /* Give the table a soft semi-transparent backing */
    background-color: rgba(255, 255, 255, 0.30);
    
    border-radius: 8px;
    overflow: hidden;             
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

        th {
            background-color: #2c3e50;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            padding: 14px 12px;
            text-align: left;
            border: none;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eef2f5;
            font-size: 14px;
            color: #333;
        }

        th:nth-child(1), td:nth-child(1), 
        th:nth-child(4), td:nth-child(4), 
        th:nth-child(6), td:nth-child(6), 
        th:nth-child(8), td:nth-child(8) {
            text-align: center;
        }

      /* Table Rows - Soft Alternating Zebra Stripes */
tbody tr {
    background-color: rgba(255, 255, 255, 0.20);
}

tbody tr:nth-child(even) {
    background-color: rgba(240, 244, 248, 0.45); /* Subtle alternate row shading */
}

/* High-tech glow on row hover */
tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.70);
    transition: 0.2s ease-in-out;
}

        a.btn-hapus {
            color: #e74c3c;
            font-weight: bold;
            text-decoration: none;
        }

        /* --- UPDATED PAGINATION STYLES --- */
        .pagination { 
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-top: 25px;     /* Clears table overlap! */
            margin-bottom: 10px;
            padding-top: 10px;
        }

        .pagination a { 
            padding: 8px 14px; 
            border: 1px solid #dcdfe6; 
            text-decoration: none; 
            color: #2c3e50; 
            background-color: #ffffff; 
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .pagination a.active { 
            background-color: #2c3e50; 
            color: white; 
            border-color: #2c3e50; 
        }

        .pagination a:hover:not(.active) { 
            background-color: #e2e8f0; 
            border-color: #cbd5e1;
        }
    </style>
</head>
<body>

<!-- Main Centered Container Card -->
<div class="container">

    <h2>Daftar Mahasiswa - Kampus NieR</h2>

    <!-- Controls Toolbar -->
    <div class="controls">
        <form method="GET" action="webdl.php">
            <label for="prodi">Filter Program Studi:</label>
            <select name="prodi" id="prodi">
                <option value="">-- All Departments --</option>
                <option value="Informatika" <?php if($filter_prodi == 'Informatika') echo 'selected'; ?>>Informatika</option>
                <option value="Sistem Informasi" <?php if($filter_prodi == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
                <option value="Sains Data" <?php if($filter_prodi == 'Sains Data') echo 'selected'; ?>>Sains Data</option>
                <option value="bisnis digital" <?php if($filter_prodi == 'bisnis digital') echo 'selected'; ?>>Bisnis Digital</option>
            </select>
            <button type="submit">Filter Data</button>
        </form>

        <div style="display: flex; align-items: center; gap: 15px;">
            <a href="tambahdata.php" style="background-color: #27ae60; color: white; padding: 8px 14px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px;">
                + Tambah Mahasiswa
            </a>
            <div>Total Records: <strong><?php echo $total_records; ?></strong></div>
        </div>
    </div>

    <!-- Data Matrix Table -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Lengkap</th>
                <th>L/P</th>
                <th>Program Studi</th>
                <th>Angkatan</th>
                <th>Agama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $no = $offset + 1; 
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row["npm"] . "</td>";
                    echo "<td>" . $row["nama_mahasiswa"] . "</td>";
                    echo "<td>" . $row["jenis_kelamin"] . "</td>";
                    echo "<td>" . $row["program_studi"] . "</td>";
                    echo "<td>" . $row["angkatan"] . "</td>";
                    echo "<td>" . $row["agama"] . "</td>";
                    echo "<td><a href='hapus.php?id=" . $row["id_mahasiswa"] . "' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>No matching records found in the sector.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination Controls -->
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            $url = "?page=" . $i;
            if ($filter_prodi != "") {
                $url .= "&prodi=" . urlencode($filter_prodi);
            }
            
            $active_class = ($i == $page) ? "class='active'" : "";
            echo "<a href='$url' $active_class>$i</a>";
        }
        ?>
    </div>

</div>

<?php mysqli_close($conn); ?>
</body>
</html>