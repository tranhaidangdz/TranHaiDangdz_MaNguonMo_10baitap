<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bai11 - Giao diện </title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
            background-color: transparent;
            /* bỏ nền để hòa với index.php */
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #d0d7de;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(27, 31, 35, 0.1);
            min-width: 800px;
            /* nhỏ lại */
            width: 100%;
            /* responsive */
        }

        h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #24292f;
        }

        .top-bar {
            background-color: #f6f8fa;
            border: 1px solid #d0d7de;
            padding: 8px;
            text-align: center;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .btn-facebook {
            display: inline-block;
            background-color: #1877f2;
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .form-wrapper {
            display: flex;
            flex-direction: column;
            /* đổi thành cột cho gọn */
            gap: 20px;
        }

        .form-box {
            width: 100%;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
            color: #24292f;
        }

        input,
        select {
            width: 100%;
            padding: 6px;
            border: 1px solid #d0d7de;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 13px;
        }

        input[type="checkbox"] {
            width: auto;
            margin-right: 5px;
        }

        .btn {
            background-color: #2da44e;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            color: #fff;
            font-weight: 600;
            padding: 6px 12px;
            cursor: pointer;
            font-size: 13px;
        }

        .btn:disabled {
            background-color: #94d3a2;
            cursor: not-allowed;
        }

        .section-title {
            font-weight: 600;
            margin: 8px 0;
            color: #24292f;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="top-bar">
            <a href="#" class="btn-facebook">Login with Facebook</a>
        </div>

        <div class="form-wrapper">
            <!-- Login Form -->
            <div class="form-box">
                <h2>Login</h2>
                <form>
                    <label>Username</label>
                    <input type="text" name="username">

                    <label>Password</label>
                    <input type="password" name="password">

                    <label><input type="checkbox"> Remember Me</label>

                    <button type="submit" class="btn">Log In</button>
                </form>
            </div>

            <!-- Signup Form -->
            <div class="form-box">
                <h2>Signup for New Account?</h2>
                <form>
                    <label>User Name</label>
                    <input type="text" name="username">

                    <label>User Email *</label>
                    <input type="email" name="email">

                    <label>Select Title</label>
                    <select>
                        <option>Mr.</option>
                        <option>Mrs.</option>
                        <option>Ms.</option>
                    </select>

                    <label>Full name *</label>
                    <input type="text" name="fullname">

                    <div class="section-title">Company detail</div>
                    <label>Company name</label>
                    <input type="text" name="company">

                    <label><input type="checkbox"> I am agree with registration</label>

                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>