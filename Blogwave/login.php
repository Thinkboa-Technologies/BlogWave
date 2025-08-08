<?php
session_start();
include "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ? and password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $password);
        $stmt->fetch();
        $_SESSION["id"] = $id;
        $_SESSION["email"] = $email;
        header("Location: add_blog.php");
        exit;
    } else {
        echo "<script>alert('Invalid Username or Password.');</script>";
    }

$stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php
    include "includes/nav.php";
    ?>

    <div class="container">
        <div class="login mb-2 ">
            <form method="post" action="" class="login-form col-md-4 p-5">
                <h2 class="text-center mb-5">Login</h2>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" required class="form-control " placeholder="Email">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="form-control btn btn-info">Login</button>
                </div>
                <div class="mt-3 text-center">
                    <small>Don't have an account? <a href="register.php">Sign up </a></small>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>