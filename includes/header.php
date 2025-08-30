<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
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