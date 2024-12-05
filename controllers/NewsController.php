<?php
require_once 'models/News.php';

class NewsController
{
    public function index()
    {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require_once 'views/news/index.php';
    }

    public function detail($id)
    {
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);
        require_once 'views/news/detail.php';
    }

    public function search()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $newsModel = new News();
        $results = $newsModel->searchNews($keyword);
        require_once 'views/news/search.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];

            $newsModel = new News();
            $newsModel->createNews($title, $content, $image, $category_id);

            header("Location: index.php?controller=admin/news");
        }
        require_once 'views/admin/news/add.php';
    }

    public function edit($id)
    {
        $newsModel = new News();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];

            $newsModel->updateNews($id, $title, $content, $image, $category_id);
            header("Location: index.php?controller=admin/news");
        }
        $news = $newsModel->getNewsById($id);
        require_once 'views/admin/news/edit.php';
    }

    public function delete($id)
    {
        $newsModel = new News();
        $newsModel->deleteNews($id);
        header("Location: index.php?controller=admin/news");
    }
}
