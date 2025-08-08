<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'blogs';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT id, title, blog, author_name, image_url, created_at FROM posts 
                            WHERE title LIKE ? OR blog LIKE ? 
                            ORDER BY id DESC");
    $searchTerm = "%$search%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT id, title, blog, author_name, image_url, created_at FROM posts ORDER BY id DESC";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="container py-5">
        <!-- search bar -->
        <h1 class="mb-4 text-center text-primary fw-bold mb-5"> Blog Posts</h1>

        <form method="GET" class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control form-control-lg"
                        placeholder="Search blog posts..."
                        value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-primary btn-lg" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="row mt-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6 my-2">
                        <div class="card blog-post shadow border-0">

                            <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="Image">
                            <div class="card-body d-flex flex-column shadow-lg">
                                <h4 class="card-title"><?= (htmlspecialchars(substr($row['title'], 0, 50))); ?><?= strlen($row['title']) > 50 ? '...' : ''; ?></h4>
                                <p class="card-text"><?= nl2br(htmlspecialchars(substr($row['blog'], 0, 100))); ?><?= strlen($row['blog']) > 100 ? '...' : ''; ?>
                                    <a href="view_post.php?id=<?= urlencode($row['id']); ?>" class="mt-auto">Read More</a>
                                </p>
                                <div class="card-bottom d-flex mb-1 justify-content-between mb-2">
                                    <p><small><i class="fa-solid fa-pen"></i>Author : <?= htmlspecialchars($row['author_name']); ?></small></p>
                                    <p class="float-end"><small class="text-muted ">
                                            <?= date("M j, Y \\a\\t g:i A", strtotime($row['created_at'])) ?>
                                        </small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">No blogs found.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>