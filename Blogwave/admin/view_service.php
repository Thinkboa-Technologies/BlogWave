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
<?php
include '../includes/db.php';
$sql = "SELECT * FROM blog_services";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-light">
    <?php
include '../includes/admin_nav.php';
?>
    <div class="container mt-5">
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            
                            <th>Title</th>
                            <th>Description</th>
                            <th>icons</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                               
                                <td><?= htmlspecialchars($row["title"]) ?></td>
                                <td><?= htmlspecialchars($row["description"]) ?></td>
                                <td><?= htmlspecialchars($row["icon_class"]) ?></td>
                                <td> <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info text-center">No user records found.</div>
            <?php endif; ?>
        </div>

</body>

</html>