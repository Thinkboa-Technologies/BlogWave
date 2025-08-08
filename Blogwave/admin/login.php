<?php
session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["ad_email"]);
    $password = trim($_POST["ad_password"]);
    $stmt = $conn->prepare("SELECT admin_id, name, admin_password FROM admin WHERE email = ? ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $name, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION["admin_id"] = $admin_id;
            $_SESSION["email"] = $email;
            header("Location: add_service.php");
            exit;
        } else {
            echo "<script>alert('Invalid Username or Password.');</script>";
        }
    } else {
        echo "Invalid request.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <style>
        .login {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 600px;
}

.login-form, .register-form{
  box-shadow: 2px 2px 12px gray, -2px -2px 12px gray;
  border-radius: 10px;
}
    </style>
</head>

<body>
    <?php
    include '../includes/admin_nav.php';
    ?>

    <div class="container">
        <div class="login mb-2 ">
            <form method="post" action="" class="login-form col-md-4 p-5">
                <h2 class="text-center mb-5">Admin Login</h2>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="ad_email" required class="form-control " placeholder="Email">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="ad_password" required class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="form-control btn btn-info">Login</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>

</html>