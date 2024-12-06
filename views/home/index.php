<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .news-row {
            margin-bottom: 20px;
        }

        .card {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: stretch;
            width: 100%;
            height: 200px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-img {
            width: 30%;
            object-fit: cover;
            border-radius: 8px 0 0 8px;
        }

        .card-body {
            flex-grow: 1;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-primary {
            width: fit-content;
            align-self: flex-start;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">List of News</h1>

        <!-- Form tìm kiếm -->
        <form method="GET" action="index.php" class="my-4">
            <input type="hidden" name="controller" value="home">
            <input type="hidden" name="action" value="search">
            <div class="input-group mb-4">
                <input type="text" name="keyword" class="form-control" placeholder="Search news..." required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Danh sách tin tức -->
        <div class="news-list">
            <?php foreach ($newsList as $news): ?>
                <div class="news-row">
                    <div class="card">
                        <img src="<?php echo $news['image']; ?>" class="card-img" alt="News Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                            <p class="card-text">
                                <?php echo substr(htmlspecialchars($news['content']), 0, 150) . '...'; ?>
                            </p>
                            <a href="index.php?controller=home&action=detail&id=<?php echo $news['id']; ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>