<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $icon_class = $conn->real_escape_string($_POST['icon_class']);

    $sql = "INSERT INTO blog_services (title, description, icon_class) VALUES ('$title', '$description', '$icon_class')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
include '../includes/admin_nav.php';
?>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Add Service</h2>

        <form method="post" class="mx-auto bg-white p-4 rounded shadow" shadow-lg >
            <div class="mb-3">
                <label class="form-label">Service Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">
                    Icon Class
                    <span class="text-muted small"></span>
                </label>
                <input type="text" name="icon_class" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Add Service</button>
           <a href="view_service.php" class="btn btn-warning text-decoration-none">View</a>
        </form>
        <div class="mt-4">
            <a href="../service.php" class="btn btn-link">View All Services</a>
        </div>

</body>

</html>