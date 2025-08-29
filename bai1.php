<?php
function isPrime($n)
{
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = intval($_POST["number"]);
    $sum = 0;
    $primes = [];
    for ($i = 2; $i <= $n; $i++) {
        if (isPrime($i)) {
            $primes[] = $i;
            $sum += $i;
        }
    }
    $primeList = implode(", ", $primes);
    $result = "Các số nguyên tố từ 1 đến $n là: <br><strong>$primeList</strong><br><br>";
    $result .= "👉 Tổng các số nguyên tố từ 1 đến $n là: <strong>$sum</strong>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1 - Tính tổng số nguyên tố</title>
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
        <h2>🧮 Bài 1: Tính tổng số nguyên tố</h2>
        <form method="post">
            <label for="number">Nhập số n:</label>
            <input type="number" id="number" name="number" min="1" placeholder="Ví dụ: 100" required>
            <button type="submit">Tính toán</button>
        </form>

        <?php if ($result): ?>
            <div class="result">
                <?= $result ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>