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

<div class="container mt-5">
    <h2 style="color: #800000;">Pending Facility Requests</h2>
    <table class="table table-hover bg-white shadow-sm">
        <thead style="background-color: #FFD700; color: #800000;">
            <tr>
                <th>Student ID</th>
                <th>Facility</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
</div>