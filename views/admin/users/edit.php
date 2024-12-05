<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Edit User</h2>
        <form action="index.php?controller=admin&action=editUser&id=<? $user['id'] ?>" method="POST" class="form">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" id="password" class="form-control" value="<?= htmlspecialchars($user['password']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?controller=admin&action=showUsers" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>