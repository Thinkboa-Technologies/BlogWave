<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $about_title = trim($_POST['about_title']);
    $about_content = trim($_POST['about_content']);

    $stmt = $conn->prepare("UPDATE about_section SET about_title = ?, about_content = ?  WHERE id = ?");
    $stmt->bind_param("ssi", $about_title, $about_content, $id);
    if ($stmt->execute()) {
        echo "<script>alert('About updated successfully!'); window.location.href='fetch_about.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Invalid request method.";
}
$conn->close();
?>

 