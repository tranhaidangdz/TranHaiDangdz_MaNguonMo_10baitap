<!-- Footer -->
<footer class="footer">
    © 2025 TranHaiDang - Học lập trình web hiệu quả
</footer>

<script>
    // Tô active cho sidebar khi click
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.addEventListener('click', function(e) {
            document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Hiệu ứng focus search bar
    let searchInput = document.querySelector('.search-bar input');
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.style.borderColor = '#58a6ff';
        });
        searchInput.addEventListener('blur', function() {
            this.style.borderColor = '#30363d';
        });
    }
</script>