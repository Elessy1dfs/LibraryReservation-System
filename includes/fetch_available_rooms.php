<?php
include 'connect.php';

if(isset($_POST['date']) && isset($_POST['time'])){
    $date = $_POST['date'];
    $time = $_POST['time'];

    // SQL: Find facilities that are NOT already 'Approved' for this specific slot
    $sql = "SELECT * FROM tblfacilities 
            WHERE status = 'Available' 
            AND facility_id NOT IN (
                SELECT facility_id FROM tblreservations 
                WHERE reservation_date = '$date' 
                AND time_slot = '$time' 
                AND status = 'Approved'
            )";

    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res) > 0){
        echo '<option value="">-- Select Space --</option>';
        while($row = mysqli_fetch_array($res)){
            echo "<option value='".$row['facility_id']."'>".$row['facility_name']."</option>";
        }
    } else {
        echo '<option value="">No rooms available for this slot</option>';
    }
}
?>
