<?php 
session_start();
include 'connect.php';
require_once 'includes/header.php'; 

if(isset($_POST['facility_id'])){
    $student_id = $_SESSION['username'];
    $facility_id = mysqli_real_escape_string($conn, $_POST['facility_id']);
    $res_date = $_POST['res_date'];
    $time_slot = mysqli_real_escape_string($conn, $_POST['time_slot']);

    $check = mysqli_query($conn, "SELECT * FROM tblreservations 
                                  WHERE facility_id = '$facility_id' 
                                  AND reservation_date = '$res_date' 
                                  AND time_slot = '$time_slot' 
                                  AND status = 'Approved'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Error: This slot was just taken! Please choose another.'); window.location.href='reserve_facility.php';</script>";
    } else {
        // Insertion logic will follow in next commit
    }
}

require_once 'includes/footer.php';
?>