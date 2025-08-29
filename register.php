<?php
require_once 'includes/auth.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = 'Mật khẩu xác nhận không khớp!';
    } elseif (strlen($password) < 6) {
        $error = 'Mật khẩu phải có ít nhất 6 ký tự!';
    } elseif ($auth->register($username, $email, $password)) {
        $success = 'Đăng ký thành công! Bạn có thể đăng nhập ngay.';
    } else {
        $error = 'Tên đăng nhập hoặc email đã tồn tại!';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - TranHaiDang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0d1117 0%, #21262d 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f0f6fc;
        }

        .register-container {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 16px 32px rgba(1, 4, 9, 0.85);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 48px;
            color: #f78166;
            margin-bottom: 10px;
        }

        .logo h1 {
            color: #f0f6fc;
            font-size: 24px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #f0f6fc;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            background: #0d1117;
            border: 1px solid #30363d;
            border-radius: 8px;
            color: #f0f6fc;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        input:focus {
            outline: none;
            border-color: #58a6ff;
            box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.1);
        }

        .btn {
            width: 100%;
            padding: 12px 16px;
            background: #238636;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn:hover {
            background: #2ea043;
        }

        .error {
            background: #da3633;
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #238636;
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #30363d;
        }

        .login-link a {
            color: #58a6ff;
            text-decoration: none;
            font-size: 14px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="logo">
            <i class="fab fa-github"></i>
            <h1>GitHub Clone</h1>
        </div>

        <?php if ($error): ?>
            <div class="error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success">
                <i class="fas fa-check-circle"></i> <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-user-plus"></i> Đăng ký
            </button>
        </form>

        <div class="login-link">
            <p>Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
        </div>
    </div>
</body>

</html>