<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'blogs';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and get post ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid blog post ID.");
}

$id = intval($_GET['id']);
$sql = "SELECT title, blog, image_url FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("Blog post not found.");
}

$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($row['title']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">

</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container py-5">
        <div class="post-container bg-white p-4 shadow rounded">
            <h1 class="post-title mb-3"><?= htmlspecialchars($row['title']); ?></h1>
            <img src="admin/<?= $row['image_url']; ?>" class="img-fluid post-image mb-4" alt="Post Image">
            <div class="post-content fs-5">
                <?= nl2br(htmlspecialchars($row['blog'])); ?>
            </div>
            <a href="index.php" class="btn btn-primary mt-4">← Back to Blogs</a>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>