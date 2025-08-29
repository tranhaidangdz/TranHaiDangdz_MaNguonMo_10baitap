<?php
session_start();
if (!isset($_SESSION["seq"])) $_SESSION["seq"] = [];

$msg = "";
$final = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $v = floatval($_POST["so"]);
    if ($v == 0) {
        $final = "Dãy số đã nhập: <strong>" . (count($_SESSION["seq"])?implode(", ", $_SESSION["seq"]):"—") . "</strong>";
        session_unset(); session_destroy(); // reset cho lần sau
    } else {
        $_SESSION["seq"][] = $v;
        $msg = "Đã ghi nhận: <strong>$v</strong> (nhập 0 để kết thúc)";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Bài 4 - Nhập đến 0 thì dừng</title>
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
        <h2>🧮 Bài 4: Nhập số cho đến khi 0 thì dừng</h2>
        <form method="post">
            <label for="so">Nhập một số (0 để dừng):</label>
            <input type="number" id="so" name="so" step="any" required>
            <button type="submit">Nhập</button>
        </form>
        <?php if ($msg): ?><div class="result"><?= $msg ?></div><?php endif; ?>
        <?php if ($final): ?><div class="result"><?= $final ?></div><?php endif; ?>
    </div>
</body>

</html>