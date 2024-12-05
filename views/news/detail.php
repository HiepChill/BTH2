<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center"><?php echo htmlspecialchars($news['title']); ?></h1>
        <div class="text-center my-4">
            <img src="<?php echo $news['image']; ?>" alt="Hình ảnh tin tức" class="img-fluid">
        </div>
        <p class="text-muted">Danh mục: <?php echo htmlspecialchars($news['category_name']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($news['content'])); ?></p>
        <a href="index.php" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
</body>

</html>