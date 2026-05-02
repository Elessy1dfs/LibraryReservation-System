<?php
session_start();
include 'connect.php';
require_once 'includes/header.php';

// Logic to handle clicking "Accept" or "Decline"
if(isset($_GET['action']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $new_status = ($_GET['action'] == 'approve') ? 'Approved' : 'Rejected';
    
    mysqli_query($conn, "UPDATE tblreservations SET status='$new_status' WHERE res_id=$id");
    header("Location: admin_requests.php");
}
?>