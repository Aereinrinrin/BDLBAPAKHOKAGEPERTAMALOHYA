<?php
// 1. Re-establish connection to the mainframe database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db mhws";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) { 
    die("error gmw " . mysqli_connect_error()); 
}

// 2. Intercept the ID parameter sent from webdl.php URL (?id=X)
if (isset($_GET['id'])) {
    // Cast to integer to secure against SQL injection attempts
    $id = (int)$_GET['id'];

    // 3. Construct the SQL Purge Protocol
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id";
    
    // Execute the query on MySQL
    if (mysqli_query($conn, $query)) {
        // Record purged successfully! Immediately reroute back to webdl.php
        header("Location: webdl.php");
        exit();
    } else {
        echo "gagal delete " . mysqli_error($conn);
    }
} else {
    // If someone accesses hapus.php directly without an ID, send them back to the main list
    header("Location: webdl.php");
    exit();
}

mysqli_close($conn);
?>