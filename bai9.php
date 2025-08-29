<?php
$output = "";
$error = "";
$inputSeconds = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputSeconds = trim($_POST['seconds'] ?? '');
    if ($inputSeconds === '' || !is_numeric($inputSeconds)) {
        $error = "Vui lòng nhập một số giây hợp lệ (số nguyên không âm).";
    } else {
        $sec = intval($inputSeconds);
        if ($sec < 0) {
            $error = "Số giây không được âm.";
        } else {
            $h = intdiv($sec, 3600);
            $m = intdiv($sec % 3600, 60);
            $s = $sec % 60;
            $output = sprintf("%02d:%02d:%02d", $h, $m, $s);
        }
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Bài 9 - Đổi giây sang giờ:phút:giây</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: #0d1117;
            color: #c9d1d9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 560px;
            margin: 24px auto;
            background: #161b22;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #30363d;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        h2 {
            color: #58a6ff;
            margin: 0 0 14px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #30363d
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #c9d1d9
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #30363d;
            background: #0d1117;
            color: #c9d1d9;
            margin-bottom: 12px;
        }

        .controls {
            display: flex;
            gap: 8px
        }

        button {
            background: #238636;
            color: #fff;
            border: 0;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer
        }

        button:hover {
            background: #2ea043
        }

        .result {
            margin-top: 16px;
            padding: 14px;
            background: #0d1117;
            border: 1px solid #30363d;
            border-radius: 8px
        }

        .error {
            margin-top: 12px;
            padding: 12px;
            background: #3b1b1b;
            border: 1px solid #5c1b1b;
            color: #ffd6d6;
            border-radius: 6px
        }

        .time-box {
            font-family: monospace;
            font-size: 22px;
            padding: 8px 12px;
            background: #0b1114;
            border-radius: 6px;
            display: inline-block
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>🧮 Bài 9: Chuyển giây → giờ:phút:giây</h2>

        <form method="post" novalidate>
            <label for="seconds">Nhập số giây:</label>
            <input type="number" id="seconds" name="seconds" min="0" step="1"
                value="<?php echo htmlspecialchars($inputSeconds); ?>" required>
            <div class="controls">
                <button type="submit">Chuyển</button>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($output !== ""): ?>
            <div class="result">
                <p><strong>Kết quả:</strong></p>
                <div class="time-box"><?php echo $output; ?></div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>