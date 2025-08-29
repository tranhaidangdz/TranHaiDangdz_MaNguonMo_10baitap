<?php
// a. Tính tổng T = 1/2 + 2/3 + 3/4 + … + n/(n+1)
function sum_a($n)
{
    $i = 1;
    $sum = 0;
    while ($i <= $n) {
        $sum += $i / ($i + 1);
        $i++;
    }
    return $sum;
}

// b. Tính tổng T = 1/2 + 1/4 + 1/6 + … 1/(n+2)
// với điều kiện e = 1/(n+2) > 0.0001
function sum_b()
{
    $n = 0;
    $sum = 0;
    $e = 1 / ($n + 2);
    while ($e > 0.0001) {
        $sum += 1 / ($n + 2);
        $n += 2;
        $e = 1 / ($n + 2);
    }
    return $sum;
}

$resultA = $resultB = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = intval($_POST["number"]);
    $resultA = "Tổng chuỗi a (T = 1/2 + 2/3 + ... + n/(n+1)) với n=$n là: <strong>" . sum_a($n) . "</strong>";
    $resultB = "Tổng chuỗi b (T = 1/2 + 1/4 + 1/6 + ... 1/(n+2) với e > 0.0001) là: <strong>" . sum_b() . "</strong>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Tính tổng chuỗi</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #0d1117;
            color: #c9d1d9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #161b22;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            color: #58a6ff;
            border-bottom: 1px solid #30363d;
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #30363d;
            background-color: #0d1117;
            color: #c9d1d9;
            margin-bottom: 15px;
        }

        button {
            background-color: #238636;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2ea043;
        }

        .result {
            margin-top: 15px;
            padding: 15px;
            background-color: #161b22;
            border: 1px solid #30363d;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>🧮 Bài 2: Tính tổng chuỗi</h2>
        <form method="post">
            <label for="number">Nhập số n:</label>
            <input type="number" id="number" name="number" min="1" placeholder="Ví dụ: 10" required>
            <button type="submit">Tính tổng</button>
        </form>

        <?php if ($resultA): ?>
            <div class="result"><?= $resultA ?></div>
            <div class="result"><?= $resultB ?></div>
        <?php endif; ?>
    </div>
</body>

</html>