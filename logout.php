<?php 
 
session_start();
session_destroy();
echo"<script>alert('Berhasil Logout')</script>";
header("Location: index.php");
 
?>