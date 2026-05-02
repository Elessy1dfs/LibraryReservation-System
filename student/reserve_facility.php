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
       $sql = "INSERT INTO tblreservations (student_id, facility_id, reservation_date, time_slot, status) 
                VALUES ('$student_id', '$facility_id', '$res_date', '$time_slot', 'Pending')";
        
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Reservation Sent!'); window.location.href='my_reservations.php';</script>";
            exit();
        }
    }
}

require_once 'includes/footer.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow" style="border: 2px solid #800000;">
                <div class="card-header text-center" style="background-color: #800000; color: #FFD700;">
                    <h3><img src="images/sealnew_copy.original.png" width="35"> BOOK A FACILITY</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="reserve_facility.php">
    <div class="form-group">
        <label class="font-weight-bold">1. Select Date:</label>
        <input type="date" id="res_date" name="res_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>
    </div>

    <div class="form-group">
        <label class="font-weight-bold">2. Select Time:</label>
        <select id="time_slot" name="time_slot" class="form-control" required disabled>
            <option value="">-- Pick Date First --</option>
            <option>08:00 AM - 10:00 AM</option>
            <option>10:00 AM - 12:00 PM</option>
            <option>01:00 PM - 03:00 PM</option>
            <option>03:00 PM - 05:00 PM</option>
        </select>
    </div>

    <div class="form-group">
        <label class="font-weight-bold">3. Available Rooms:</label>
        <select id="facility_id" name="facility_id" class="form-control" required disabled>
            <option value="">-- Pick Time First --</option>
        </select>
    </div>

    <button type="submit" id="submitBtn" class="btn btn-maroon btn-block mt-4 font-weight-bold" disabled>
        BOOK NOW
    </button>
</form>
                </div>
                <div class="card-footer text-center" style="background: #FFD700; color: #800000; font-size: 0.8rem;">
                    Logged in as: <?php echo $_SESSION['username']; ?>
                </div>
            </div>
        </div>
    </div>
</div>