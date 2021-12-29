<?php
require_once './config.php';
$id = $_GET['id'];
$sql = "DELETE FROM book where id_book = '$id'";
$query = mysqli_query($connect, $sql);
header("location: ../admin/admin.php");
