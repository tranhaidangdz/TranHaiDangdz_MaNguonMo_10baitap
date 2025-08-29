<?php
$result = "";
function factorial($n)
{
    $res = 1;
    for ($i = 2; $i <= $n; $i++) $res *= $i;
    return $res;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = max(0, intval($_POST["n"]));
    $result = "$n! = <strong>" . factorial($n) . "</strong>";
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Bài 6 - Giai thừa</title>
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
        <h2>🧮 Bài 6: Tính giai thừa</h2>
        <form method="post">
            <label for="n">Nhập n:</label>
            <input type="number" id="n" name="n" min="0" required>
            <button type="submit">Tính</button>
        </form>
        <?php if ($result): ?><div class="result"><?= $result ?></div><?php endif; ?>
    </div>
</body>

</html>