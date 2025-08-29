<?php
class Person
{
    public $hoTen;
    public $ngaySinh;
    public $queQuan;

    public function __construct($hoTen, $ngaySinh, $queQuan)
    {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
    }
}

class SinhVien extends Person
{
    public $lop;

    public function __construct($hoTen, $ngaySinh, $queQuan, $lop)
    {
        parent::__construct($hoTen, $ngaySinh, $queQuan);
        $this->lop = $lop;
    }

    public function getInfo()
    {
        return [
            "Họ và tên" => $this->hoTen,
            "Ngày sinh" => $this->ngaySinh,
            "Quê quán" => $this->queQuan,
            "Lớp" => $this->lop
        ];
    }
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = $_POST["hoTen"];
    $ngaySinh = $_POST["ngaySinh"];
    $queQuan = $_POST["queQuan"];
    $lop = $_POST["lop"];

    $sv = new SinhVien($hoTen, $ngaySinh, $queQuan, $lop);
    $info = $sv->getInfo();

    $result = "<ul>";
    foreach ($info as $key => $value) {
        $result .= "<li><strong>$key:</strong> $value</li>";
    }
    $result .= "</ul>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 10 - Thông tin Sinh viên</title>
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

        input[type="text"],
        input[type="date"] {
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

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            margin: 6px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>🧑‍🎓 Bài 10: Thông tin Sinh viên</h2>
        <form method="post">
            <label for="hoTen">Họ và tên:</label>
            <input type="text" id="hoTen" name="hoTen" required>

            <label for="ngaySinh">Ngày sinh:</label>
            <input type="date" id="ngaySinh" name="ngaySinh" required>

            <label for="queQuan">Quê quán:</label>
            <input type="text" id="queQuan" name="queQuan" required>

            <label for="lop">Lớp:</label>
            <input type="text" id="lop" name="lop" required>

            <button type="submit">Hiển thị thông tin</button>
        </form>

        <?php if ($result): ?>
            <div class="result">
                <h3>📋 Thông tin cá nhân</h3>
                <?= $result ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>