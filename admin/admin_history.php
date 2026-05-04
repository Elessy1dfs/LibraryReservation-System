<?php
session_start();
include 'connect.php';
require_once 'includes/header.php';

// Security: Only Admins allowed
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("Location: index.php");
    exit();
}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #800000;">Reservation History Log</h2>
        <a href="admin_requests.php" class="btn btn-outline-danger">Back to Pending</a>
    </div>
?>
    


