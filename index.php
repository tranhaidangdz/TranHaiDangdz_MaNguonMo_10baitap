<?php
require_once 'includes/auth.php';

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['logout'])) {
    $auth->logout();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - TranHaiDang221230799</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Thêm CSS để giữ layout không bị vỡ khi load bài 1-11 */
        .content {
            padding: 20px;
            overflow-x: auto;
        }

        .page-wrapper {
            background: #161b22;
            padding: 20px;
            border: 1px solid #d0d7de;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(27, 31, 35, 0.1);
            max-width: 900px;
            /* Giới hạn chiều rộng */
            margin: 0 auto;
            /* Căn giữa */
        }

        /* Responsive để form hoặc bảng trong các bài không bị tràn */
        .page-wrapper table {
            width: 100%;
            border-collapse: collapse;
        }

        .page-wrapper img,
        .page-wrapper video,
        .page-wrapper iframe {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .page-wrapper form {
            max-width: 100%;
        }
    </style>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="main-container">
        <?php include 'includes/sidebar.php'; ?>

        <div class="content">
            <?php
            // Nếu có tham số page thì include file tương ứng
            if (isset($_GET['page'])) {
                $page = basename($_GET['page']); // tránh hack path
                $file = "{$page}.php";

                if (file_exists($file)) {
                    echo '<div class="page-wrapper">';
                    include $file;
                    echo '</div>';
                } else {
                    echo "<h2>Trang không tồn tại!</h2>";
                }
            } else {
                // Mặc định hiển thị dashboard chào mừng
            ?>
                <div class="welcome-section">
                    <h1>Chào mừng, <?php echo $_SESSION['username']; ?>!</h1>
                    <p>Chào mừng bạn đến với web TranHaiDang - nơi học lập trình web hiệu quả</p>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon"><i class="fas fa-code"></i></div>
                                <div class="stat-title">Họ tên</div>
                            </div>
                            <div class="stat-number">Trần Hải Đăng</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon"><i class="fas fa-star"></i></div>
                                <div class="stat-title">Khoa</div>
                            </div>
                            <div class="stat-number">Công nghệ thông tin</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon"><i class="fas fa-users"></i></div>
                                <div class="stat-title">Lớp</div>
                            </div>
                            <div class="stat-number">CNTT3</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon"><i class="fas fa-code-branch"></i></div>
                                <div class="stat-title">Khóa</div>
                            </div>
                            <div class="stat-number">K63</div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>