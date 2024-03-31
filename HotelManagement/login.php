<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurent Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">
</head>
<?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
        echo "
        <div class='user'>
            $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
        </div>
        ";
    }
    else{
        echo "
        <div class='sign-in-up'>
            <button type='button' onclick=\"popup('login-popup')\">Login</button>
            <button type='button' onclick=\"popup('register-popup')\">Register</button>
        </div>
        ";
    }
?>

<!-- -------------- login ------------------------------- -->
<div class="popup-container" id="login-popup">
    <div class=" popup">
        <form action="login_register.php" method="POST">
            <h2>
                <span>User Login</span>
                <button type="reset" onclick="popup('login-popup')">X</button>
            </h2>
            <input type="text" placeholder="E-mail or Username" name="email_username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" class="login-btn" name="login">Login</button>
        </form>
        <div class="forgot-btn">
            <button type="button" onclick="forgotPopup()">Forgot Password</button>
        </div>
    </div>
</div>

<div class="popup-container" id="register-popup">
    <div class="register popup">
        <form action="login_register.php" method="POST">
            <h2>
                <span>User REGISTER</span>
                <button type="reset" onclick="popup('register-popup')">X</button>
            </h2>
            <input type="text" placeholder="FULL NAME"  name="fullname" required>
            <input type="text" placeholder="User Name" name="username" required>
            <input type="email" placeholder="E-Mail"  name="email" required>
            <input type="password" placeholder="Password"  name="password" required>
            <button type="submit" class="register-btn" name="register">Register</button>
        </form>
    </div>
</div>

<div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
        <form action="forgotpassword.php" method="POST">
            <h2>
                <span>Reset Password</span>
                <button type="reset" onclick="popup('forgot-popup')">X</button>
            </h2>
            <input type="email" placeholder="E-mail" name="email">
            
            <button type="submit" class="reset-btn" name="send-reset-link">Send Link</button>
        </form>
    </div>
</div>
<!-- Display login status message -->
<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
{
    echo "<p style='text-align:center;'>You are logged in as: $_SESSION[username]</p>";
}
?>
<script>
        function popup(popup_name)
        {
             get_popup=document.getElementById(popup_name);
             if(get_popup.style.display=="flex")
            {
                get_popup.style.display="none";
            }
            else{
                get_popup.style.display="flex";
            }
        }

        function forgotPopup()
        {
            document.getElementById('login-popup').style.display="none";
            document.getElementById('forgot-popup').style.display="flex";
        }
    </script>
</html>