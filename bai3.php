<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $x = floatval($_POST["x"]);
    $n = max(1, intval($_POST["n"]));

    $sum = 0.0;
    $fact = 1.0;            // 1!
    for ($i = 1; $i <= $n; $i++) {
        $fact *= $i;        // i!
        $sum += pow($x, $i) / $fact;
    }
    $result = "S($x, $n) = <strong>$sum</strong>";
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Bài 3 - Tính S(x,n)</title>
    <style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        background: #0d1117;
        color: #c9d1d9;
        margin: 0;
        padding: 20px
    }

    .container {
        max-width: 600px;
        margin: auto;
        background: #161b22;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .5)
    }

    h2 {
        color: #58a6ff;
        border-bottom: 1px solid #30363d;
        padding-bottom: 10px
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700
    }

    input[type="number"] {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #30363d;
        background: #0d1117;
        color: #c9d1d9;
        margin-bottom: 15px
    }

    button {
        background: #238636;
        color: #fff;
        border: 0;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer
    }

    button:hover {
        background: #2ea043
    }

    .result {
        margin-top: 15px;
        padding: 15px;
        background: #161b22;
        border: 1px solid #30363d;
        border-radius: 6px
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>🧮 Bài 3: Tính S(x, n)</h2>
        <form method="post">
            <label for="x">Nhập x:</label>
            <input type="number" id="x" name="x" step="any" required>
            <label for="n">Nhập n:</label>
            <input type="number" id="n" name="n" min="1" required>
            <button type="submit">Tính</button>
        </form>
        <?php if ($result): ?><div class="result"><?= $result ?></div><?php endif; ?>
    </div>
</body>

</html>