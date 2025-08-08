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
$sql = "SELECT * FROM about_section WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
    echo "Blog not found.";
    exit;
}
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?php
  include '../includes/admin_nav.php';
  ?>
    <div class="container mt-5">
        <h2 class="my-4 text-center">Upadate Content</h2>
        <form action="update_about.php" class="shadow p-5" method="POST">
            <div class="about com-md-9">
                 <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="mb-3 ">
                    <label class="form-label">About Title</label>
                    <input name="about_title" class="form-control" required value = "<?= htmlspecialchars($row['about_title']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">About Content</label>
                    <textarea name="about_content" class="form-control" rows="5" required ><?= htmlspecialchars($row['about_content']) ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="about_fetch.php" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>