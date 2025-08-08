<?php
session_start();
if (!isset($_SESSION['admn_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $title = trim($_POST['title']);
    $blog = trim($_POST['blog']);

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = "uploads/";
        $targetFile = $targetDir . time() . "_" . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    // Update query
    $stmt = $conn->prepare("UPDATE posts SET title = ?, blog = ?, image_url = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $blog, $imagePath, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Blog updated successfully'); window.location.href='fetch.php';</script>";
    } else {
        echo "Failed to update blog: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
