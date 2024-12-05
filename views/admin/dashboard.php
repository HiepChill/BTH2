<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Admin dashboard</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Admin Dashboard</h2>
        <?php
        $userCount = count($users);

        if ($userCount === 0) {
            echo "<br>No users found.<br><br>";
        } elseif ($userCount === 1) {
            echo "<br>There is only one user.<br><br>";
        } else {
            echo "<br>There are $userCount users.<br><br>";
        }
        ?>
        <a href="index.php?controller=home&action=index" class="btn btn-primary mb-3">Home</a>
        <a href="index.php?controller=admin&action=showUsers" class="btn btn-primary mb-3">Manage users</a>
        <a href="index.php?controller=admin&action=showNews" class="btn btn-primary mb-3">Manage news</a>
    </div>
</body>


</html>