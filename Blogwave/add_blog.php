<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blogwave</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">                  
                    <li class="nav-item">
                        <button><a class="nav-link link-dark" href="admin/logout.php">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Upload Blog</h2>
        <form action="upload.php" method="POST"  class="bg-white p-4 rounded shadow" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image_url" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label"> Blog</label>
                <textarea name="blog" id="blog" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Post Blog</button>
                <button type="submit" name="submit" class="btn btn-danger"><a href="admin/fetch.php" class="text-decoration-none link-light">Edit Blog</a></button>
            </div>
        </form>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>