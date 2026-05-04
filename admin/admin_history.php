<?php
session_start();
include 'connect.php';
require_once 'includes/header.php';

// Security: Only Admins allowed
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("Location: index.php");
    exit();
}
?>
