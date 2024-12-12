<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM siswa WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
