<?php
include 'includes/db.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $con_password = trim($_POST["con_password"]);
    // Check if passwords match
    if ($password !== $con_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if email already exists
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $error = "Email is already registered.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                $success = "Registration successful. <a href='login.php'>Login</a>";
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php
    include 'includes/nav.php';
    ?>
    <div class="container ">

        <div class="register mb-2">
            <form method="post" action="" class="register-form col-md-4 p-5">
                <h2 class="text-center mb-5">Register</h2>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div class="alert alert-success text-center"><?php echo $success; ?></div>
                <?php endif; ?>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" required class="form-control" placeholder="Enter Full Name"><br>

                </div>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" required class="form-control"><br>
                </div>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="password"><br>
                </div>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="con_password" class="form-control" required placeholder="Confirm Password"><br>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-info form-control">Submit</button>
                </div>
                <div class="mt-3 text-center">
                    <small>Already have an account?<a href="login.php">Login</a></small>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>