<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>
<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>

<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 65vh; gap: 20px;">
    <a href="register.php" style="text-decoration: none;">
        <<button style="width: 280px; padding: 15px; background-color: #800000; color: #FFD700; border: 2px solid #FFD700; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s;">
            REGISTER AS NEW STUDENT
        </button>
    </a>

    <<a href="login.php?role=student" style="text-decoration: none;">
        <button style="width: 280px; padding: 15px; background-color: #800000; color: #FFD700; border: 2px solid #FFD700; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s;">
            LOGIN AS STUDENT</button>
    </a>

    <a href="login.php?role=admin" style="text-decoration: none;">
        <button style="width: 280px; padding: 15px; background-color: #800000; color: #FFD700; border: 2px solid #FFD700; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s;">
            LOGIN AS ADMIN
        </button>
    </a>
</div>



<?php require_once 'includes/footer.php'; ?>