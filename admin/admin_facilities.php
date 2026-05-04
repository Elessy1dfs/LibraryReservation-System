<?php 
session_start();
include 'connect.php';

// Security Check: Ensure only logged-in students can access
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'student'){
    header("Location: index.php");
    exit();
}

$error_msg = "";
?>
