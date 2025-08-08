<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
include '../includes/db.php';
$sql = "SELECT username, email, contactno, message FROM contact_message";
$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?Php include '../includes/admin_nav.php'; ?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Contact List</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Emal</th>
                        <th>Contact No</th>
                        <th>Messages</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["username"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["contactno"]) ?></td>
                            <td><?= htmlspecialchars($row["message"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info text-center">No records found.</div>
        <?php endif; ?>
         </div>

</body>

</html>
<?php ?>