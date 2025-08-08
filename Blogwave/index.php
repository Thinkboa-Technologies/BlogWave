<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'blogs';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, about_title, about_content FROM about_section";
$result = $conn->query($sql);

$sql2 = "SELECT id, title, blog, image_url, created_at FROM posts ORDER BY id DESC Limit 3";
$post = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Section - Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/style.css">
</head>

<body class="bg-light">
    <?php include 'includes/nav.php'; ?>

    <header>
        <div class="banner">
            <img class="w-100" src="https://www.jonespr.net/hubfs/Blog_Images/Blog_278_Blog.jpg" alt="First slide">
        </div>
    </header>
    <!-- About -->
    <div class="container py-5">
        <div class="section-header text-primary">
            <i class="bi bi-people-fill me-1"></i>
            About Our Blog
        </div>
        <div class="row justify-content-center">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-10">
                        <div class="card about-card shadow-sm animate__animated animate__fadeInUp">
                            <h2 class="card-title text-center mb-2"><?= htmlspecialchars($row["about_title"]) ?></h2>
                            <p class="text-center"><?= nl2br(htmlspecialchars($row["about_content"])) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-info text-center">No about section records found.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Latest cards -->
    <div class="container py-5">
        <div class=" latest mb-4 text-center text-primary fw-bold"> Latest Post</div>
        <div class="row">
            <?php if ($post->num_rows > 0): ?>
                <?php while ($row = $post->fetch_assoc()): ?>
                    <div class="col-md-4 my-2">
                        <div class="card latest_blog shadow border-0">
                            <img src="<?= $row['image_url'] ?>" class="card-img-top img-fluid" alt="Image">
                            <div class="card-body d-flex flex-column shadow-lg">
                                <h4 class="card-title"><?= (htmlspecialchars(substr($row['title'], 0, 30))); ?><?= strlen($row['title']) > 30 ? '...' : ''; ?></h4>
                                <p class="card-text"><?= nl2br(htmlspecialchars(substr($row['blog'], 0, 50))); ?><?= strlen($row['blog']) > 50 ? '...' : ''; ?>
                                    <a href="view_post.php?id=<?= urlencode($row['id']); ?>" class="mt-auto">Read More</a>
                                </p>
                                <p><small class="text-muted float-end">
                                        <?= date("M j, Y \\a\\t g:i A", strtotime($row['created_at'])) ?>
                                    </small></p>

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