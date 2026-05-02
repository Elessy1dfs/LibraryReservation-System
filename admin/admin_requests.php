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
    exit();
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
            <?php
            $sql = "SELECT r.*, f.facility_name FROM tblreservations r 
                    JOIN tblfacilities f ON r.facility_id = f.facility_id 
                    WHERE r.status = 'Pending'";
            $res = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_array($res)){
                    echo "<tr>
                            <td>{$row['student_id']}</td>
                            <td>{$row['facility_name']}</td>
                            <td>{$row['reservation_date']}</td>
                            <td>{$row['time_slot']}</td>
                            <td>
                                <a href='?action=approve&id={$row['res_id']}' class='btn btn-success btn-sm'>Accept</a>
                                <a href='?action=reject&id={$row['res_id']}' class='btn btn-danger btn-sm'>Decline</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No pending reservations.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>