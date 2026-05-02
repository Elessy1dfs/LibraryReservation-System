<?php
include 'connect.php';
require_once 'includes/header.php';

// Add Book Logic
if(isset($_POST['btnAddBook'])){
    $title = mysqli_real_escape_string($conn, $_POST['txttitle']);
    $desc = mysqli_real_escape_string($conn, $_POST['txtdesc']);
    $date = $_POST['txtdate'];

    $sql = "INSERT INTO tblbooks (title, description, date_added) VALUES ('$title', '$desc', '$date')";
    mysqli_query($conn, $sql);
}


?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-4">
            <div style="background-color: #800000; color: #FFD700; padding: 20px; border-radius: 10px;">
                <h4>Add New Book</h4>
                <form method="post">
                    <input type="text" name="txttitle" placeholder="Title" required class="form-control mb-2">
                    <textarea name="txtdesc" placeholder="Description" class="form-control mb-2"></textarea>
                    <input type="date" name="txtdate" required class="form-control mb-2">
                    <button type="submit" name="btnAddBook" class="btn btn-warning btn-block">SAVE BOOK</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead style="background-color: #FFD700; color: #800000;">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM tblbooks");
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>
                                <td>".$row['title']."</td>
                                <td>".$row['description']."</td>
                                <td>".$row['date_added']."</td>
                                <td><a href='?delete=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>