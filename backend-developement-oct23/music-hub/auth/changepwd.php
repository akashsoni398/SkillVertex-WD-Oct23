<?php
    $errmsg = "";
    
    session_start();
    include "./../dbconfig.php";
    
    if(isset($_POST['submit'])) {
        $id = $_SESSION['userid'];
        $opwd = mysqli_real_escape_string($conn,$_POST['opwd']);
        $npwd = mysqli_real_escape_string($conn,$_POST['npwd']);
        $cnpwd = mysqli_real_escape_string($conn,$_POST['cnpwd']);

        if($opwd!="" && $npwd!="" && $cnpwd!="") {
            if($npwd===$cnpwd) {
                $sql_query = "SELECT password as pwdhash FROM users WHERE id='$id';";
                $result = mysqli_query($conn,$sql_query);
                $rows = mysqli_fetch_array($result);
                if(password_verify($opwd,$rows['pwdhash'])) {
                    $hash_pwd = password_hash($npwd,PASSWORD_BCRYPT);
                    $sql_query = "UPDATE users SET password='$hash_pwd' WHERE id='$id';";
                    $result = mysqli_query($conn,$sql_query);
                    if($result) {
                        header("Location:login.php");
                    }
                }
                else {
                    $errmsg = "Old password did not match";
                }
            }
            else {
                $errmsg = "New passwords entered did not match";
            }
        }
        else {
            $errmsg = "All input fields are mandatory";
        }
    }

?>

<html lang="en" >
    <head>
    <meta charset="UTF-8">
    <title>Simple Change Passwd Form Example</title>
    <link rel="stylesheet" href="./../assets/css/auth.css">

    </head>
    <body>
        <div class="auth-form">
            <form method="post" action=""> 
                <h1>Change User Password</h1>
                <div class="content">
                    <div class="input-field">
                        <input type="password" placeholder="Enter Old Password" name="opwd" cautocomplete="new-password" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Enter New Password" name="npwd" cautocomplete="new-password" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Confirm New Password" name="cnpwd" cautocomplete="new-password" required>
                    </div>
                        <p class="error"><?php echo $errmsg ?></p>
                        <button type="submit" name="submit" value="register" class="link">SUBMIT</button><br>
                        <a href="#" class="link">Forgot Your Password?</a>
                    </div>
                    <div class="action">
                        <button>Register</button>
                        <button>Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>