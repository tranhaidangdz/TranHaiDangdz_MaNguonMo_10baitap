<?php
require_once 'includes/auth.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($auth->login($username, $password)) {
        header('Location: index.php');
        exit();
    } else {
        $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - TranHaiDang</title>
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

        .login-container {
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
            font-size: 16px;
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

        input[type="text"]:focus,
        input[type="password"]:focus {
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

        .register-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #30363d;
        }

        .register-link a {
            color: #58a6ff;
            text-decoration: none;
            font-size: 14px;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <i class="fab fa-github"></i>
            <h1>TRANHAIDANG-221230799</h1>
        </div>

        <?php if ($error): ?>
            <div class="error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Tên đăng nhập hoặc Email</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </button>
        </form>

        <div class="register-link">
            <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
        </div>
    </div>
</body>

</html>