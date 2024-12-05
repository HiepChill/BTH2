<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?= $news['title'] ?></h1>
        <div class="card">
            <img src="<?= $news['image'] ?>" class="card-img-top" alt="<?= $news['title'] ?>">
            <div class="card-body">
                <p><strong>Danh mục:</strong> <?= $news['category_name'] ?></p>
                <p class="card-text"><?= $news['content'] ?></p>
                <a href="index.php" class="btn btn-secondary mt-3">Quay lại</a>
            </div>
        </div>
    </div>
</body>

</html>