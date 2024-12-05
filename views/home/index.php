<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách Tin tức</h1>

        <!-- Form tìm kiếm -->
        <form method="GET" action="index.php?controller=home&action=search" class="my-4">
            <input type="hidden" name="url" value="home/search">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tin tức..." required>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Danh sách tin tức -->
        <div class="row">
            <?php foreach ($newsList as $news): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $news['image']; ?>" class="card-img-top" alt="Hình ảnh tin tức">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                            <p class="card-text">
                                <?php echo substr(htmlspecialchars($news['content']), 0, 100) . '...'; ?>
                            </p>
                            <a href="index.php?controller=home&action=detail&id=<?php echo $news['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>