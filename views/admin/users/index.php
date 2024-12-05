<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>User Management</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">All users</h2>
        <a href="index.php?controller=admin&action=addUser" class="btn btn-primary mb-3">Add new user</a>
        <?php if (!empty($users)) : ?>
            <table class="table table-bordered table-striped">
                <thead class="table">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['password']) ?></td>
                            <td>
                                <a href="index.php?controller=admin&action=editUser&id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </a>
                            </td>
                            <td>
                                <a href="index.php?controller=admin&action=deleteUser&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">
                                    <i class='fa-solid fa-trash'></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="alert alert-info">There is no user.</div>
        <?php endif; ?>
    </div>
</body>

</html>