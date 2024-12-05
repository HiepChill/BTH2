<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kết quả tìm kiếm</h1>
        <p>Từ khóa: <strong><?= htmlspecialchars($_GET['keyword']) ?></strong></p>
        <div class="row">
            <?php if (empty($results)): ?>
                <div class="alert alert-warning text-center">Không tìm thấy kết quả phù hợp.</div>
            <?php else: ?>
                <?php foreach ($results as $news): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= $news['image'] ?>" class="card-img-top" alt="<?= $news['title'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $news['title'] ?></h5>
                                <p class="card-text"><?= substr($news['content'], 0, 100) ?>...</p>
                                <a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>