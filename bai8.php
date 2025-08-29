<?php
$result = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw = trim($_POST['numbers'] ?? '');
    // tách theo dấu phẩy hoặc khoảng trắng
    $parts = preg_split('/[,\s]+/', $raw, -1, PREG_SPLIT_NO_EMPTY);
    $nums = [];
    foreach ($parts as $p) {
        // chấp nhận số nguyên hoặc số có dấu
        if (is_numeric($p)) {
            $nums[] = intval($p);
        }
    }

    if (count($nums) < 10) {
        $error = "Vui lòng nhập ít nhất 10 số nguyên (sử dụng dấu phẩy hoặc khoảng trắng để phân tách). Hiện có " . count($nums) . " số hợp lệ.";
    } else {
        // lấy đúng 10 phần tử đầu
        $arr = array_slice($nums, 0, 10);
        $positive = 0;
        $negative = 0;
        $zero = 0;
        foreach ($arr as $v) {
            if ($v > 0) $positive++;
            elseif ($v < 0) $negative++;
            else $zero++;
        }

        $result = [
            'array' => $arr,
            'positive' => $positive,
            'negative' => $negative,
            'zero' => $zero
        ];
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Bài 8 - Đếm số âm, dương</title>
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
            max-width: 700px;
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

        textarea {
            width: 100%;
            min-height: 100px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #30363d;
            background: #0d1117;
            color: #c9d1d9;
            resize: vertical;
        }

        .hint {
            font-size: 13px;
            color: #8b949e;
            margin-top: 6px
        }

        .controls {
            margin-top: 12px
        }

        button {
            background: #238636;
            color: #fff;
            border: 0;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #2ea043
        }

        .result {
            margin-top: 16px;
            padding: 14px;
            background: #0d1117;
            border: 1px solid #30363d;
            border-radius: 8px;
        }

        .error {
            margin-top: 12px;
            padding: 12px;
            background: #3b1b1b;
            border: 1px solid #5c1b1b;
            color: #ffd6d6;
            border-radius: 6px
        }

        code {
            background: #0b1114;
            padding: 2px 6px;
            border-radius: 4px;
            color: #c9d1d9
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>🧮 Bài 8: Khởi tạo mảng 10 phần tử — Đếm số âm & dương</h2>

        <form method="post" novalidate>
            <label for="numbers">Nhập 10 số nguyên (phân tách bằng dấu phẩy hoặc khoảng trắng):</label>
            <textarea id="numbers" name="numbers"
                placeholder="Ví dụ: 5, -3, 0, 8, -7, 4, -1, 9, -6, 2"><?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers']) : '5, -3, 0, 8, -7, 4, -1, 9, -6, 2'; ?></textarea>
            <div class="hint">Lưu ý: nếu bạn nhập nhiều hơn 10 số thì chương trình sẽ lấy 10 số đầu; nếu ít hơn 10 số sẽ
                báo lỗi.</div>

            <div class="controls">
                <button type="submit">Xử lý</button>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($result): ?>
            <div class="result">
                <p><strong>Mảng (10 phần tử):</strong> <code><?php echo implode(", ", $result['array']); ?></code></p>
                <p><strong>Số phần tử dương:</strong> <?php echo $result['positive']; ?></p>
                <p><strong>Số phần tử âm:</strong> <?php echo $result['negative']; ?></p>
                <p><strong>Số phần tử bằng 0:</strong> <?php echo $result['zero']; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>