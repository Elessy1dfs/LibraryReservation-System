
<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>

<div style="display: flex; justify-content: center; align-items: center; padding: 40px; min-height: 75vh; background-color: #ffffff;">
    
    <div style="background-color: #800000; padding: 30px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.4); width: 450px; color: #FFD700;">
        
        <form method="post" style="display: flex; flex-direction: column; gap: 15px;">
            
            <h3 style="text-align: center; margin-top: 0; text-decoration: underline; font-family: 'Arial Black', sans-serif;">STUDENT REGISTRATION</h3>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Student ID</label>
                <input type="text" name="txtstudentid" placeholder="Enter ID (e.g. 2026-0001)" required 
                       style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #FFD700; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">First Name</label>
                <input type="text" name="txtfirstname" placeholder="Enter First Name" required 
                       style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #FFD700; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Last Name</label>
                <input type="text" name="txtlastname" placeholder="Enter Last Name" required 
                       style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #FFD700; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Program</label>
                <input type="text" name="txtprogram" placeholder="e.g. BSIT, BSCS" required 
                       style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #FFD700; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Year Level</label>
                <select name="txtyearlevel" required 
                        style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #FFD700; background: white; cursor: pointer;">
                    <option value="">Select Year Level</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Create Password</label>
                <input type="password" name="txtpassword" placeholder="Enter Password" required 
                       style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #FFD700; box-sizing: border-box;">
            </div>
                                    
            <input type="submit" name="btnRegister" value="REGISTER NOW" 
                   style="margin-top: 10px; background-color: #FFD700; color: #800000; font-weight: bold; border: none; padding: 15px; border-radius: 5px; cursor: pointer; transition: 0.3s; font-size: 16px;"> 
        </form>
    </div>
</div>