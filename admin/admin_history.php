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
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #800000;">Reservation History Log</h2>
        <a href="admin_requests.php" class="btn btn-outline-danger">Back to Pending</a>
    </div>

    <table class="table table-bordered shadow-sm">
        <thead style="background-color: #800000; color: #FFD700;">
            <tr>
                <th>Student ID</th>
                <th>Facility Name</th>
                <th>Date</th>
                <th>Time Slot</th>
                <th>Final Status</th>
            </tr>
        </thead>
        <tbody class="bg-white">

    <?php
// Pull only Approved or Rejected records
$sql = "SELECT r.*, f.facility_name FROM tblreservations r 
        JOIN tblfacilities f ON r.facility_id = f.facility_id 
        WHERE r.status != 'Pending' 
        ORDER BY r.res_id DESC";
$res = mysqli_query($conn, $sql);
?>
<?php
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_array($res)){
        $statusColor = ($row['status'] == 'Approved') ? 'text-success' : 'text-danger';
        echo "<tr>
                <td>{$row['student_id']}</td>
                <td>{$row['facility_name']}</td>
                <td>{$row['reservation_date']}</td>
                <td>{$row['time_slot']}</td>
                <td class='font-weight-bold $statusColor'>{$row['status']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No history found.</td></tr>";
}
?>
    


