<?php
$conn = mysqli_connect("localhost", "root", "", "db mhws");

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Purge record matching target ID
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id";
    mysqli_query($conn, $query);
}

// Reroute back to main list
header("Location: webdl.php");
exit();
?>