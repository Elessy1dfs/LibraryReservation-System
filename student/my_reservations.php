<?php
session_start();
include 'connect.php';
require_once 'includes/header.php';

// Security Check
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'student'){
    header("Location: index.php");
    exit();
}

$student_id = $_SESSION['username'];

// DELETE/CANCEL LOGIC
if(isset($_GET['cancel_id'])){
    $cancel_id = $_GET['cancel_id'];
    
    // Safety check: Only allow deleting if its THEIR reservation and its still PENDING
    $delete_sql = "DELETE FROM tblreservations WHERE res_id = $cancel_id AND student_id = '$student_id' AND status = 'Pending'";
    
    if(mysqli_query($conn, $delete_sql)){
        echo "<script>alert('Booking cancelled successfully.'); window.location.href='my_reservations.php';</script>";
    }
}
?>

<div class="container mt-5">
    <h2 style="color: #800000;">My Reservation Status</h2>
    <table class="table shadow-sm bg-white mt-4">
        <thead style="background-color: #FFD700; color: #800000;">
            <tr>
                <th>Facility</th>
                <th>Date</th>
                <th>Time Slot</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT r.*, f.facility_name FROM tblreservations r 
                    JOIN tblfacilities f ON r.facility_id = f.facility_id 
                    WHERE r.student_id = '$student_id' 
                    ORDER BY r.res_id DESC";
            $res = mysqli_query($conn, $sql);

            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_array($res)){
                    // status color
                    $badgeClass = 'badge-secondary';
                    if($row['status'] == 'Approved') $badgeClass = 'badge-success';
                    if($row['status'] == 'Rejected') $badgeClass = 'badge-danger';
                    if($row['status'] == 'Pending') $badgeClass = 'badge-warning';

                    echo "<tr>
                            <td>{$row['facility_name']}</td>
                            <td>{$row['reservation_date']}</td>
                            <td>{$row['time_slot']}</td>
                            <td><span class='badge $badgeClass'>{$row['status']}</span></td>
                            <td>";
                            
                    //cancl is showed if only reservation is Stll Pending
                    if($row['status'] == 'Pending'){
                        echo "<a href='?cancel_id={$row['res_id']}' 
                                 class='btn btn-outline-danger btn-sm' 
                                 onclick='return confirm(\"Are you sure you want to cancel this booking?\")'>
                                 Cancel Request
                              </a>";
                    } else {
                        echo "<small class='text-muted'>Finalized</small>";
                    }
                    
                    echo "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>You have no bookings yet. <a href='reserve_facility.php'>Book now!</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>
