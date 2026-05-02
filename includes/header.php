<!DOCTYPE html>
<html>
<head>
    <title>UniReserve | Library System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f4f4; }
        .navbar { background-color: #800000; border-bottom: 3px solid #FFD700; }
        .nav-link, .navbar-brand { color: #FFD700 !important; font-weight: bold; }
        .btn-maroon { background-color: #800000; color: #FFD700; border: 1px solid #FFD700; }
        .btn-maroon:hover { background-color: #FFD700; color: #800000; }
        /* Custom badge colors for history */
        .badge-approved { background-color: #28a745; color: white; }
        .badge-rejected { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">
        <img src="images/sealnew_copy.original.png" width="40" height="40" class="d-inline-block align-top" alt="">
        CITULIB UniReserve
    </a>
    
    <div class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['role'])): ?>
            <?php if($_SESSION['role'] == 'admin'): ?>
                <a class="nav-link" href="admin_facilities.php">Facilities</a>
                <a class="nav-link" href="admin_requests.php">Requests</a>
                <a class="nav-link" href="admin_history.php">History Log</a>
            <?php else: ?>
                <a class="nav-link" href="reserve_facility.php">Reserve</a>
                <a class="nav-link" href="my_reservations.php">My Bookings</a>
            <?php endif; ?>
            <a class="nav-link btn btn-outline-warning ml-2" href="logout.php">Logout</a>
        <?php else: ?>
            <a class="nav-link" href="index.php">Home</a>
        <?php endif; ?>
    </div>
  </div>
</nav>