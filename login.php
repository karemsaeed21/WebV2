
<?php
include 'header.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['cemail']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpwd']);
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password ='$password'") or die("Error: " . mysqli_error($conn));
    if(mysqli_num_rows($select) > 0){
        $message[] = 'User already Exist';
    }else{
    mysqli_query($conn, "INSERT INTO `user_form`(`name`, `email`, `password`) VALUES ('$name','$email','$password')") or die("Error: " . mysqli_error($conn));
    $message[] = 'User Added Successfully';
    
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="Css/form.css">
</head>
<body>
<?php
if(isset($message)){
    foreach($message as $msg){
        echo '<div class="alert alert-danger">'.$msg.'</div>';
    }}
?>
    <div class="container">
        <div class="forms-container">
            <div class="form-control signup-form">
                <form action="#" method="post">
                    <h2>Signup</h2>
                    <input type="text" name="uname" placeholder="Username" required />
                    <input type="email" name="cemail" placeholder="Email" required />
                    <input type="password" name="pwd" placeholder="Password" required />
                    <input type="password" name="cpwd" placeholder="Confirm password" required />
                    <input type="submit" name="submit" class="btn" value="register now">
                </form>
                <span>or signup with</span>
                    <div class="socials">
                        <a href="https://www.facebook.com/login"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://plus.google.com/login"><i class="fab fa-google-plus-g"></i></a>
                        <a href="https://www.linkedin.com/login"><i class="fab fa-linkedin-in"></i></a>
                    </div>
            </div>
            <div class="form-control signin-form">
                <form action="#">
                    <h2>Signin</h2>
                    <input type="text" placeholder="Username" required />
                    <input type="password" placeholder="Password" required />
                    <button>Signin</button>
                </form>
                <span>or signin with</span>
                    <div class="socials">
                        <a href="https://www.facebook.com/login"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://plus.google.com/login"><i class="fab fa-google-plus-g"></i></a>
                        <a href="https://www.linkedin.com/login"><i class="fab fa-linkedin-in"></i></a>
                    </div>  
            </div>
        </div>
        <div class="intros-container">
            <div class="intro-control signin-intro">
                <div class="intro-control__inner">
                    <h2>Welcome back!</h2>
                    <p>
                        Welcome back! We are so happy to have you here. It's great to see you again. We hope you had a
                        safe and enjoyable time away.
                    </p>
                    <button id="signup-btn">No account yet? Signup.</button>
                </div>
            </div>
            <div class="intro-control signup-intro">
                <div class="intro-control__inner">
                    <h2>Come join us!</h2>
                    <p>
                        We are so excited to have you here.If you haven't already, create an account to get access to
                        exclusive offers, rewards, and discounts.
                    </p>
                    <button id="signin-btn">Already have an account? Signin.</button>
                </div>
            </div>
        </div>
    </div>
    <script src="Js/c.js"></script>
</body>

</html>