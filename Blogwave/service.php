
 <?php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $dbname = 'blogs';
   $conn = new mysqli($host, $user, $password, $dbname);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT id, title, description, icon_class FROM blog_services";
   $result = $conn->query($sql);
   ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
 </head>

 <body>
    <?php
   include 'includes/nav.php';
   ?>
    <div class="container">
       <div class="hero my-3 p-2">
          <h2 class="text-center text-primary p-2 display-4">Our Services</h2>
          <p class="text-center p-2">Empower your blog with our powerful features. From seamless content creation to robust analytics,
             blog_system gives you the tools to engage your audience and grow your online presence.</p>
       </div>

       <div class="row">
          <?php if ($result->num_rows > 0): ?>
             <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-3 d-flex">
                   <div class="card w-100 p-2">
                      <div class="row g-0">
                         <p class="card-text text-center">
                            <i class="<?= htmlspecialchars($row["icon_class"]) ?>" style="font-size: 3rem; color: #0d6efd;"></i>
                         </p>
                         <div class="col-md-12">
                            <div class="card-body">
                               <h3 class="card-title text-center"><?= htmlspecialchars($row["title"]) ?></h3>
                               <p class="card-text text-center"><?= htmlspecialchars($row["description"]) ?></p>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             <?php endwhile; ?>
          <?php else: ?>
             <div class="alert alert-info text-center">No blogs found.</div>
          <?php endif; ?>
       </div>
    </div>
    <?php
      include 'includes/footer.php';
      ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>

 