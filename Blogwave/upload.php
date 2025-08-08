<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include 'includes/db.php';
 
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $blog = trim($_POST['blog']);
    $image_url = $_FILES['image_url'];

    // Validate image
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir);
    }
    $imageName = basename($image_url["name"]);

    $targetFile = $targetDir . time() . "_" . $imageName;

    $imageType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
 
    $allowedTypes = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    if (!in_array($imageType, $allowedTypes)) {
        die("Only JPG, PNG, JPEG, and GIF are allowed.");
    }
    if (move_uploaded_file($image_url["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("INSERT INTO posts (title, blog, image_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $blog, $targetFile);
        $stmt->execute();
        echo "<script>alert('Upload successful!'); window.location.href='blog.php';</script>";
    } else {
        echo "Error uploading file.";
    }
}
$conn->close();
?>

 