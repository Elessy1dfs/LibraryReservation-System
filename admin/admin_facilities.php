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
// Handle the POST request
if(isset($_POST['btnReserve'])){
    $student_id = $_SESSION['username'];
    $facility_id = mysqli_real_escape_string($conn, $_POST['facility_id']);
    $res_date = $_POST['res_date'];
    $time_slot = mysqli_real_escape_string($conn, $_POST['time_slot']);
    
    // FINAL SERVER-SIDE CHECK: Prevent double-booking if two users submit simultaneously
    $conflict_sql = "SELECT * FROM tblreservations 
                     WHERE facility_id = '$facility_id' 
                     AND reservation_date = '$res_date' 
                     AND time_slot = '$time_slot' 
                     AND status = 'Approved'";
    
    $conflict_result = mysqli_query($conn, $conflict_sql);

    if(mysqli_num_rows($conflict_result) > 0){
        $error_msg = "Sorry! Someone just took that spot. Please try a different room or time.";
    } 
    else {
        $sql = "INSERT INTO tblreservations (student_id, facility_id, reservation_date, time_slot, status) 
                VALUES ('$student_id', '$facility_id', '$res_date', '$time_slot', 'Pending')";
        
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Reservation Sent!'); window.location.href='my_reservations.php';</script>";
            exit();
        }
    }
    // ... insert logic follows
}
require_once 'includes/header.php'; 
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow" style="border: 2px solid #800000;">
                <div class="card-header text-center" style="background-color: #800000; color: #FFD700;">
                    <h3>BOOK A FACILITY</h3>
                </div>
                <div class="card-body">
                    <?php if($error_msg != ""): ?>
                        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <!-- Form groups follow -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
