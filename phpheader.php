<?php
session_start();
if (!isset($_SESSION['userPrev'])) {
header('location:index.php');
}

 ?>
