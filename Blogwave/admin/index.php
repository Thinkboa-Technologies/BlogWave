<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>
<?php
include '../includes/db.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $abtitle = $conn->real_escape_string($_POST['about_title']);
    $abcontent = $conn->real_escape_string($_POST['about_content']);
 
    $sql = "INSERT INTO about_section (about_title, about_content) VALUES ('$abtitle', '$abcontent')";
 
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } 
    else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
include '../includes/admin_nav.php';
?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Update your about page</h2>
        <form action="" method="POST"  class="bg-white p-4 rounded shadow">
    

          <div class="mb-3">
                <label class="form-label">About title</label>
                <input type="text" name="about_title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">About-paragraph</label>
                <textarea name="about_content" class="form-control" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">insert</button>
                <button name="submit" class="btn btn-danger"><a href="fetch_about.php" class="text-decoration-none link-light">Edit</a></button>
            </div>
        </form>
    </div>
</body>
</html>
