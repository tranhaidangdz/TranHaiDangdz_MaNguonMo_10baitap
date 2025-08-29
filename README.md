# TranHaiDangdz_MaNguonMo_10baitap - Hướng dẫn cài đặt

## Yêu cầu hệ thống
- XAMPP (Apache, MySQL, PHP)
- Trình duyệt web hiện đại: chrome, coccoc, firefox...
- Text editor (VS Code, Sublime Text, ...)

## Cách cài đặt

### Bước 1: Cài đặt XAMPP
1. Tải XAMPP từ: https://www.apachefriends.org/
2. Cài đặt và khởi động Apache và MySQL

### Bước 2: Tạo project
1. Tạo thư mục `github_clone` trong `xampp/htdocs/`
2. Copy tất cả files vào thư mục này:
- TranHaiDangdz_MaNguonMo_10baitap/
TranHaiDangdz_MaNguonMo_10baitap/
├── config/
│   └── database.php
├── includes/
│   └── auth.php
├── index.php
├── login.php
├── register.php
├── logout.php
└── .htaccess

### Bước 3: Tạo database
1. Mở phpMyAdmin: http://localhost/phpmyadmin
2. Chạy script SQL từ file `database.sql`
3. Hoặc tạo database `TranHaiDangdz_MaNguonMo_10baitap` và import file SQL

### Bước 4: Cấu hình
1. Mở file `config/database.php`
2. Kiểm tra thông tin kết nối database:
   - Host: localhost
   - Database: github_clone
   - Username: root
   - Password: (để trống nếu dùng XAMPP mặc định)

### Bước 5: Truy cập website
1. Mở trình duyệt
2. Truy cập: http://localhost/github_clone
3. Sẽ tự động redirect đến trang login

## Tài khoản mặc định
- Username: `admin`
- Password: `123456`

## Chức năng đã có
- ✅ Hệ thống đăng nhập/đăng ký
- ✅ Dashboard với thống kê
- ✅ Sidebar navigation giống GitHub
- ✅ Responsive design
- ✅ Session management
- ✅ Password hashing
- ✅ SQL injection protection

## Tính năng có thể mở rộng
- Quản lý repositories thật
- Upload/download files
- Git integration
- User profiles
- Comments và issues
- Team collaboration
- Code syntax highlighting

## Troubleshooting

### Lỗi kết nối database
```php
// Kiểm tra trong config/database.php
private $host = 'localhost';
private $db_name = 'TranHaiDangdz_MaNguonMo_10baitap';
private $username = 'root';
private $password = ''; // Thay đổi nếu có password
```

### Lỗi session
- Đảm bảo `session_start()` được gọi trước bất kỳ output nào
- Kiểm tra quyền ghi trong thư mục session của PHP

### Lỗi .htaccess
- Bật mod_rewrite trong Apache
- Kiểm tra AllowOverride trong httpd.conf

## Bảo mật
- Passwords được hash bằng `password_hash()`
- Sử dụng Prepared Statements cho SQL
- Session security
- XSS protection headers

## Customization
- Thay đổi colors trong CSS
- Thêm/bớt sidebar items
- Customize dashboard statistics
- Thêm dark/light theme toggle
- @author: tranhaidangdz
- email: trandang211@gmail.com
