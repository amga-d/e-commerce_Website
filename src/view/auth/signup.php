<?php 
require_once __DIR__ . "/../../controllers/auth/signCont.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/assets/css/sign.css">

</head>
<body>

    <section id="signup-form" class="section-p1">
        <div class="form-container">
            <h2>Create Your Account</h2>
            <form  method="post">
                <div class="form-group">
                    <input type="text" id="fullname" name="name" value="<?= $username ?? "" ?>" required>
                    <label for="fullname">Full Name</label>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" value= "<?= $email ?? ""?>" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" value ="<?= $password ?? ""?>" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-group">
                    <input type="password" id="confirm-password" name="confirm-password" value="<?= $confirm_password  ?? ""?>" required>
                    <label for="confirm-password">Confirm Password</label>
                </div>
                <div class="form-group terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                </div>
                <button type="submit" class="submit-btn">Sign Up</button>
            </form>
            <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </section>
</body>
</html>

