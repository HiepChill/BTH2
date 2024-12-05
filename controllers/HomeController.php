<?php
require_once 'models/News.php';

class HomeController
{
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function index()
    {
        $newsList = $this->newsModel->getAllNews();
        require_once 'views/home/index.php';
    }

    public function detail()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php');
            exit();
        }

        $news = $this->newsModel->getNewsById($id);
        require_once 'views/news/detail.php';
    }

    public function search()
    {
        $keyword = $_GET['keyword'] ?? '';
        if (empty($keyword)) {
            header('Location: index.php?controller=home&action=index');
            exit();
        }

        $newsList = $this->newsModel->searchNews($keyword);
        require_once 'views/news/search.php';
    }
}
