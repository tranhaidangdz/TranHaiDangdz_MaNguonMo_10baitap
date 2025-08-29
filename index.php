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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0d1117;
            color: #f0f6fc;
            line-height: 1.5;
        }

        /* Header */
        .header {
            background: #161b22;
            border-bottom: 1px solid #30363d;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #f0f6fc;
            font-size: 18px;
            font-weight: 600;
        }

        .logo i {
            font-size: 24px;
        }

        .search-bar {
            position: relative;
            width: 300px;
        }

        .search-bar input {
            width: 100%;
            padding: 8px 12px 8px 36px;
            background: #21262d;
            border: 1px solid #30363d;
            border-radius: 6px;
            color: #f0f6fc;
            font-size: 14px;
        }

        .search-bar i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #7d8590;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-menu {
            position: relative;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #238636;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 600;
        }

        /* Main Layout */
        .main-container {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #161b22;
            border-right: 1px solid #30363d;
            padding: 24px 0;
        }

        .sidebar-section {
            margin-bottom: 24px;
        }

        .sidebar-title {
            padding: 0 24px;
            color: #7d8590;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 8px 24px;
            color: #e6edf3;
            text-decoration: none;
            transition: background-color 0.2s;
            gap: 12px;
        }

        .sidebar-item:hover {
            background: #21262d;
            color: #f0f6fc;
        }

        .sidebar-item.active {
            background: #21262d;
            color: #f0f6fc;
            border-right: 2px solid #f78166;
        }

        .sidebar-item i {
            width: 16px;
            font-size: 14px;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 24px;
        }

        .welcome-section {
            background: linear-gradient(135deg, #21262d 0%, #30363d 100%);
            border: 1px solid #30363d;
            border-radius: 12px;
            padding: 32px;
            margin-bottom: 24px;
            text-align: center;
        }

        .welcome-section h1 {
            font-size: 32px;
            margin-bottom: 16px;
            color: #f0f6fc;
        }

        .welcome-section p {
            font-size: 16px;
            color: #7d8590;
            margin-bottom: 24px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(1, 4, 9, 0.15);
        }

        .stat-header {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            gap: 12px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            background: #238636;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .stat-title {
            font-size: 14px;
            color: #7d8590;
            font-weight: 500;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 600;
            color: #f0f6fc;
        }

        .recent-activity {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 20px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #f0f6fc;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #21262d;
            gap: 12px;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 32px;
            height: 32px;
            background: #21262d;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7d8590;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-size: 14px;
            color: #f0f6fc;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: #7d8590;
        }

        .logout-btn {
            background: #da3633;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .logout-btn:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-left">
            <div class="logo">
                <i class="fab fa-github"></i>
                TranHaiDang
            </div>
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Tìm kiếm repositories...">
            </div>
        </div>
        <div class="header-right">
            <div class="user-menu">
                <div class="user-avatar">
                    <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                </div>
            </div>
            <a href="?logout=1" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                Đăng xuất
            </a>
        </div>
    </div>

    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-section">
                <div class="sidebar-title">Trang chủ</div>
                <a href="#" class="sidebar-item active">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-bell"></i>
                    Thông báo
                </a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-title">Bài tập</div>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-code-branch"></i>
                    Tất cả bài tập
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 1
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 2
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 3
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 4
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 5
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 6
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 7
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 8
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 9
                </a>

                <a href="#" class="sidebar-item">
                    <i class="fas fa-plus"></i>
                    Bài 10
                </a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-title">Học tập</div>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-book"></i>
                    HTML
                </a>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-palette"></i>
                    CSS
                </a>
                <a href="#" class="sidebar-item">
                    <i class="fab fa-php"></i>
                    PHP
                </a>
                <a href="#" class="sidebar-item">
                    <i class="fab fa-js"></i>
                    JavaScript
                </a>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-database"></i>
                    Database
                </a>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-tools"></i>
                    DevOps/Khác
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="welcome-section">
                <h1>Chào mừng, <?php echo $_SESSION['username']; ?>!</h1>
                <p>Chào mừng bạn đến với web TranHaiDang - nơi học lập trình web hiệu quả</p>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="stat-title">Họ tên</div>
                        </div>
                        <div class="stat-number">Trần Hải Đăng</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-title">Khoa</div>
                        </div>
                        <div class="stat-number">Công nghệ thông tin</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-title">Lớp</div>
                        </div>
                        <div class="stat-number">CNTT3</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-code-branch"></i>
                            </div>
                            <div class="stat-title">Khóa</div>
                        </div>
                        <div class="stat-number">K63</div>
                    </div>
                </div>
            </div>

            <div class="content-grid">
                <div class="recent-activity">
                    <div class="section-title">
                        <i class="fas fa-clock"></i>
                        Hoạt động gần đây
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Tạo repository mới: web-learning</div>
                            <div class="activity-time">2 giờ trước</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Push code to php-tutorial</div>
                            <div class="activity-time">5 giờ trước</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Star repository: awesome-php</div>
                            <div class="activity-time">1 ngày trước</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Commented on issue #15</div>
                            <div class="activity-time">2 ngày trước</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Merged pull request #8</div>
                            <div class="activity-time">3 ngày trước</div>
                        </div>
                    </div>
                </div>

                <div class="repositories-section">
                    <div class="section-title">
                        <i class="fas fa-folder"></i>
                        Repositories của bạn
                    </div>

                    <div class="repo-list">
                        <div class="repo-item">
                            <div class="repo-header">
                                <div class="repo-name">
                                    <i class="fas fa-book"></i>
                                    <a href="#">web-learning</a>
                                </div>
                                <div class="repo-visibility">Public</div>
                            </div>
                            <div class="repo-description">Tài liệu học lập trình web từ cơ bản đến nâng cao</div>
                            <div class="repo-meta">
                                <span class="language php">PHP</span>
                                <span class="stars"><i class="fas fa-star"></i> 8</span>
                                <span class="updated">Cập nhật 2 giờ trước</span>
                            </div>
                        </div>

                        <div class="repo-item">
                            <div class="repo-header">
                                <div class="repo-name">
                                    <i class="fas fa-book"></i>
                                    <a href="#">php-tutorial</a>
                                </div>
                                <div class="repo-visibility">Public</div>
                            </div>
                            <div class="repo-description">Hướng dẫn PHP từ A-Z cho người mới bắt đầu</div>
                            <div class="repo-meta">
                                <span class="language php">PHP</span>
                                <span class="stars"><i class="fas fa-star"></i> 15</span>
                                <span class="updated">Cập nhật 1 ngày trước</span>
                            </div>
                        </div>

                        <div class="repo-item">
                            <div class="repo-header">
                                <div class="repo-name">
                                    <i class="fas fa-book"></i>
                                    <a href="#">html-css-basics</a>
                                </div>
                                <div class="repo-visibility">Public</div>
                            </div>
                            <div class="repo-description">Kiến thức cơ bản về HTML và CSS</div>
                            <div class="repo-meta">
                                <span class="language html">HTML</span>
                                <span class="stars"><i class="fas fa-star"></i> 12</span>
                                <span class="updated">Cập nhật 2 ngày trước</span>
                            </div>
                        </div>

                        <div class="repo-item">
                            <div class="repo-header">
                                <div class="repo-name">
                                    <i class="fas fa-book"></i>
                                    <a href="#">javascript-advanced</a>
                                </div>
                                <div class="repo-visibility">Private</div>
                            </div>
                            <div class="repo-description">Các kỹ thuật JavaScript nâng cao và ES6+</div>
                            <div class="repo-meta">
                                <span class="language javascript">JavaScript</span>
                                <span class="stars"><i class="fas fa-star"></i> 5</span>
                                <span class="updated">Cập nhật 1 tuần trước</span>
                            </div>
                        </div>
                    </div>

                    <div class="show-more">
                        <a href="#" class="show-more-btn">
                            <i class="fas fa-arrow-right"></i>
                            Xem tất cả repositories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .repositories-section {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 20px;
        }

        .repo-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .repo-item {
            padding: 16px;
            background: #0d1117;
            border: 1px solid #21262d;
            border-radius: 8px;
            transition: border-color 0.2s;
        }

        .repo-item:hover {
            border-color: #30363d;
        }

        .repo-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .repo-name {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }

        .repo-name a {
            color: #58a6ff;
            text-decoration: none;
            font-size: 16px;
        }

        .repo-name a:hover {
            text-decoration: underline;
        }

        .repo-visibility {
            padding: 2px 8px;
            background: #21262d;
            border: 1px solid #30363d;
            border-radius: 12px;
            font-size: 12px;
            color: #7d8590;
        }

        .repo-description {
            color: #7d8590;
            font-size: 14px;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .repo-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 12px;
        }

        .language {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .language::before {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        .language.php::before {
            background: #777bb4;
        }

        .language.html::before {
            background: #e34f26;
        }

        .language.javascript::before {
            background: #f7df1e;
        }

        .stars {
            color: #7d8590;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .updated {
            color: #7d8590;
        }

        .show-more {
            margin-top: 16px;
            text-align: center;
        }

        .show-more-btn {
            color: #58a6ff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 1px solid #30363d;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.2s;
        }

        .show-more-btn:hover {
            background: #21262d;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .search-bar {
                display: none;
            }
        }
    </style>

    <script>
        // Simple interactions
        document.querySelector('.search-bar input').addEventListener('focus', function() {
            this.style.borderColor = '#58a6ff';
        });

        document.querySelector('.search-bar input').addEventListener('blur', function() {
            this.style.borderColor = '#30363d';
        });

        // Add hover effects for sidebar items
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all items
                document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));

                // Add active class to clicked item
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>