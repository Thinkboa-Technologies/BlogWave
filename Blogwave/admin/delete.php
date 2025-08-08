<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blogs";
 
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid request.";
    exit;
}
 
$id = intval($_GET['id']);
 
$sql = "DELETE FROM posts WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Post deleted successfully'); window.location.href='fetch.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// delete content from about section
$sql = "DELETE FROM about_section WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('About-content deleted successfully'); window.location.href='edit_about.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}



// delete content from service section
$sql = "DELETE FROM blog_services WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('servicea deleted successfully');</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}


 
$conn->close();
?>