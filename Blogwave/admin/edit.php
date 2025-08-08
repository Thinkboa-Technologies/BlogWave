<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid request.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "Blog not found.";
    exit;
}
$posts = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bolg edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<?php
include '../includes/admin_nav.php';
?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Blog Details</h2>

        <form action="update.php" method="POST" class="p-4 bg-white rounded shadow" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $posts['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($posts['title']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Blog</label>
                <input type="text" name="blog" class="form-control" value="<?= htmlspecialchars($posts['blog']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" value="<?= htmlspecialchars($posts['image_url']) ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="fetch.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>