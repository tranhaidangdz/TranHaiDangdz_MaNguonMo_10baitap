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
    <title>Index - TranHaiDang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="main-container">
        <?php include 'includes/sidebar.php'; ?>

        <div class="content">
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
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>