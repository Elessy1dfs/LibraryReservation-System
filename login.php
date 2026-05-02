<?php
session_start();
include 'connect.php';

require_once 'includes/header.php'; 

if(isset($_POST['btnLogin'])){
    $username = mysqli_real_escape_string($conn, $_POST['txtusername']);
    $password = $_POST['txtpassword'];

    $sql = "SELECT * FROM tbluseraccount WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <?php if(isset($error)) echo "<script>alert('$error');</script>"; ?>
    
    <div class="col-md-4 offset-md-4 card p-4 shadow" style="border: 2px solid #800000;">
        <h3 class="text-center" style="color: #800000;">LOGIN</h3>
        <form method="post">
            <input type="text" name="txtusername" class="form-control mb-3" placeholder="Username / ID" required>
            <input type="password" name="txtpassword" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" name="btnLogin" class="btn btn-maroon btn-block" style="background-color: #800000; color: #FFD700;">ENTER</button>
        </form>
    </div>
</div>