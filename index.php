<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>
<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>

<div>
    <a href="register.php">
        <button>REGISTER AS NEW STUDENT</button>
    </a>

    <a href="login.php?role=student">
        <button>LOGIN AS STUDENT</button>
    </a>

    <a href="login.php?role=admin">
        <button>LOGIN AS ADMIN</button>
    </a>
</div>



<?php require_once 'includes/footer.php'; ?>