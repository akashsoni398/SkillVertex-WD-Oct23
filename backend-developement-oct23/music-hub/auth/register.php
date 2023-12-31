<?php
    $errmsg = "";

    include "./../dbconfig.php";
    
    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
        $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd']);

        if($name!="" && $email!="" && $pwd!="" && $cpwd!="") {
            if($pwd===$cpwd) {
                $sql_query = "SELECT count(*) as usercount FROM users WHERE email='$email';";
                $result = mysqli_query($conn,$sql_query);
                $rows = mysqli_fetch_array($result);
                if($rows['usercount']!=1) {
                    $hash_pwd = password_hash($pwd,PASSWORD_BCRYPT);
                    $sql_query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hash_pwd');";
                    $result = mysqli_query($conn,$sql_query);
                    if($result) {
                        header("Location:login.php");
                    }
                    else {
                        $errmsg = "An unknown error occured. Please contact customer support.";
                    }
                }
                else {
                    $errmsg = "Email address already registered. Login into your account.";
                }
            }
            else {
                $errmsg = "Entered passwords did not match";
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
    <title>Simple register Form Example</title>
    <link rel="stylesheet" href="./../assets/css/auth.css">

    </head>
    <body>
        <div class="auth-form">
            <form method="post" action=""> 
                <h1>Register</h1>
                <div class="content">
                    <div class="input-field">
                        <input type="text" placeholder="Full Name" name="name" required>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Enter Password" name="pwd" cautocomplete="new-password" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Confirm Password" name="cpwd" cautocomplete="new-password" >
                    </div>
                    <p class="error"><?php echo $errmsg ?></p>
                    <button type="submit" name="submit" value="register" class="link">SUBMIT</button><br>
                    <a href="#" class="link">Forgot Your Password?</a>
                    </div>
                    <div class="action">
                    <button>Register</button>
                    <button>Sign in</button>
                </div>
            </form>
        </div>
    </body>
</html>