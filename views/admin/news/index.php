<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách Tin tức</h1>
        <a href="index.php?url=admin&action=addNews" class="btn btn-primary mb-3">Thêm Tin tức</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?= $news['title'] ?></td>
                        <td><img src="<?= $news['image'] ?>" alt="<?= $news['title'] ?>" width="100"></td>
                        <td><?= $news['category_name'] ?></td>
                        <td>
                            <a href="index.php?url=admin&action=editNews&id=<?= $news['id'] ?>" class="btn btn-warning">Sửa</a>
                            <a href="index.php?url=admin&action=deleteNews&id=<?= $news['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>