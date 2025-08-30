<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-section">
        <div class="sidebar-title">Trang chủ</div>
        <a href="index.php" class="sidebar-item active">
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
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <a href="bai<?php echo $i; ?>.php" class="sidebar-item">
                <i class="fas fa-plus"></i>
                Bài <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">Học tập</div>
        <a href="#" class="sidebar-item"><i class="fas fa-book"></i> HTML</a>
        <a href="#" class="sidebar-item"><i class="fas fa-palette"></i> CSS</a>
        <a href="#" class="sidebar-item"><i class="fab fa-php"></i> PHP</a>
        <a href="#" class="sidebar-item"><i class="fab fa-js"></i> JavaScript</a>
        <a href="#" class="sidebar-item"><i class="fas fa-database"></i> Database</a>
        <a href="#" class="sidebar-item"><i class="fas fa-tools"></i> DevOps/Khác</a>
    </div>
</div>