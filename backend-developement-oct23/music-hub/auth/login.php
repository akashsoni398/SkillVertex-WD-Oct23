<?php
    $errmsg = "";

    include "./../dbconfig.php";
    
    if(isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
        
        if($email!="" && $pwd!="") {
            $sql_query = "SELECT count(*) as usercount FROM users WHERE email='$email';";
            $result = mysqli_query($conn,$sql_query);
            $rows = mysqli_fetch_array($result);
            if($rows['usercount']>0) {
                $sql_query = "SELECT password as pwdhash FROM users WHERE email='$email';";
                $result = mysqli_query($conn,$sql_query);
                $rows = mysqli_fetch_array($result);
                if(password_verify($pwd,$rows['pwdhash'])) {
                    $sql_query = "SELECT id,name,email FROM users WHERE email='$email';";
                    $result = mysqli_query($conn,$sql_query);
                    $rows = mysqli_fetch_array($result);
                    session_start();
                    $_SESSION['userid'] = $rows['id'];
                    $_SESSION['username'] = $rows['name'];
                    $_SESSION['useremail'] = $rows['email'];
                    header("Location:../index.php");
                }
                else {
                    $errmsg = "Email address or password did not match. Try again!";
                }
            }
            else {
                $errmsg = "Email address not registered. Create an account to login.";
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
    <title>Simple login Form Example</title>
    <link rel="stylesheet" href="./../assets/css/auth.css">

    </head>
    <body>
        <div class="auth-form">
            <form method="post" action=""> 
                <h1>Login</h1>
                <div class="content">
                    <div class="input-field">
                        <input type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Enter Password" name="pwd" cautocomplete="new-password" required>
                    </div>
                    <p class="error"><?php echo $errmsg ?></p>
                    <button type="submit" name="submit" value="login" class="link">SUBMIT</button><br>
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