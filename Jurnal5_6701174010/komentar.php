<?php  
include 'konek.php';
session_start();
$nim = $_SESSION['nim'];
$query = mysqli_query($conn,"SELECT *FROM t_jurnal1 WHERE NIM = $nim");


?>

