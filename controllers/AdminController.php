<?php
require_once 'models/News.php';

class AdminController
{
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    // Hiển thị danh sách tin tức
    public function index()
    {
        $newsList = $this->newsModel->getAllNews();
        require_once 'views/admin/news/index.php';
    }

    // Thêm tin tức
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            // Kiểm tra và xử lý upload ảnh
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/news/';
                $imageName = basename($_FILES['image']['name']);
                $targetFilePath = $uploadDir . $imageName;

                // Tạo thư mục nếu chưa tồn tại
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Lưu file vào thư mục
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    $image = $targetFilePath;
                } else {
                    echo "Lỗi khi upload ảnh.";
                    return;
                }
            } else {
                echo "Hãy chọn một ảnh để upload.";
                return;
            }

            // Lưu dữ liệu tin tức vào CSDL
            $this->newsModel->createNews($title, $content, $image, $category_id);
            header('Location: index.php?url=admin');
        }
        require_once 'views/admin/news/add.php';
    }


    // Sửa tin tức
    public function edit()
    {
        $id = $_GET['id'];
        $news = $this->newsModel->getNewsById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = $news['image']; // Giữ ảnh cũ nếu không upload ảnh mới

            // Kiểm tra upload ảnh mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/news/';
                $imageName = basename($_FILES['image']['name']);
                $targetFilePath = $uploadDir . $imageName;

                // Tạo thư mục nếu chưa tồn tại
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Lưu ảnh mới và thay thế đường dẫn
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    $image = $targetFilePath;
                } else {
                    echo "Lỗi khi upload ảnh.";
                    return;
                }
            }

            // Cập nhật tin tức trong cơ sở dữ liệu
            $this->newsModel->updateNews($id, $title, $content, $image, $category_id);
            header('Location: index.php?url=admin');
        }

        require_once 'views/admin/news/edit.php';
    }


    // Xóa tin tức
    public function delete($id)
    {
        $this->newsModel->deleteNews($id);
        header('Location: index.php?url=admin');
    }
}
