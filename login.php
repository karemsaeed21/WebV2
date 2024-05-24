
<?php
include 'header.php';
session_start();
if (isset($_POST['submit'])) {
    //Sign up
    $name = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['cemail']);
    $password = mysqli_real_escape_string($conn, md5($_POST['pwd'])); // Hash the password with MD5
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpwd'])); // Hash the confirm password with MD5

    // Check if user already exists
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'") or die("Error: " . mysqli_error($conn));
    if(mysqli_num_rows($select) > 0){
        $message[] = 'User already Exist';
    } else {
        // If user does not exist, add them to the database
        mysqli_query($conn, "INSERT INTO `user_form`(`name`, `email`, `password`) VALUES ('$name','$email','$password')") or die("Error: " . mysqli_error($conn));
        $message[] = 'User Added Successfully';
        header('location:login.php');
    }
}

if (isset($_POST['login'])) {
    // Login
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $password = mysqli_real_escape_string($conn, $_POST['password']);
//
//    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password ='$password'") or die("Error: " . mysqli_error($conn));
//    if(mysqli_num_rows($select) > 0){
//        $row = mysqli_fetch_assoc($select);
//        $_SESSION['password'] = $row['password'];
//        $_SESSION['email'] = $row['email'];
//        $row = mysqli_fetch_assoc($select);
//        $_SESSION['user_id'] = $row['iduserform'];
//        header('location:products.html');
//    } else {
//        $message[] = 'Invalid login credentials';
//    }
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$password'") or die('query failed');

if(mysqli_num_rows($select) > 0){
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id'] = $row['iduser_form'];
    $_SESSION['user_name'] = $row['name']; // Store user name in session
    $_SESSION['user_email'] = $row['email']; // Store user email in session
    header('location:index.php');
}else{
    $message[] = 'incorrect password or email!';
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
<form action="login.php" method="post">
    <h2>Signin</h2>
    <input name="email" type="text" placeholder="Email" required />
    <input name="password" type="password" placeholder="Password" required />
    <input type="submit" name="login" class="btn" value="Signin">
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