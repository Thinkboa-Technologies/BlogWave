<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';
$sql = "SELECT id, title, blog, image_url FROM posts";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    include '../includes/admin_nav.php';
    ?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Add your blogs</h2>

        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6 mb-3 d-flex">
                        <div class="card w-100 p-2">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex align-items-center">
                                    <img src="<?= $row['image_url'] ?>" class="img-fluid" alt="Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= htmlspecialchars($row["title"]) ?></h4>
                                        <p class="card-text"><?= htmlspecialchars($row["blog"]) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <div class="alert alert-info text-center">No user records found.</div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="add_blog.php" class="btn btn-primary">Add new post</a>
            </div>
        </div>

</body>

</html>