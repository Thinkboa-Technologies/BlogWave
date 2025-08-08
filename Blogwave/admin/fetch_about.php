<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';
$sql = "SELECT * FROM about_section ";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit About Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    include '../includes/admin_nav.php';
    ?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit About Content</h2>
        <form>
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="about com-md-9">
                            <div class="mb-3 ">
                                <label class="form-label">About Title</label>
                                <h3 name="about_title" class="form-control" required><?= htmlspecialchars($row['about_title']) ?></h3>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About Content</label>
                                <p name="about_content" class="form-control" rows="5" required><?= htmlspecialchars($row['about_content']) ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="edit_about.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Delete</a>
                            </div>
                        </div>
                    <?php endwhile; ?>

                <?php else: ?>
                    <div class="alert alert-info text-center">No user records found.</div>
                <?php endif; ?>
            </div>
        </form>
    </div>
    <?php $conn->close(); ?>
</body>

</html>