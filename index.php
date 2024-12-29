<?php 
include 'connect.php'; 
session_start(); 

unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>تسجيل الدخول</title>
    <link rel="shortcut icon" href="main/images/OIP.jpeg">
    <link href="main/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style>
        /* General Page Style */
        body {
            background: linear-gradient(to bottom right, #004080, #3399ff);
            color: #fff;
            font-family: 'Cairo', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            direction: rtl;
        }

        /* Container */
        .login-container {
            background: #ffffff;
            color: #333;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }

        /* Header */
        .login-container h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #004080;
            font-weight: bold;
        }

        .login-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            color: #333;
            text-align: right;
            padding: 10px 15px;
        }

        .form-control::placeholder {
            color: #999;
        }

        /* Login Button */
        .btn-custom {
            background: linear-gradient(to right, #0066cc, #3399ff);
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            border: none;
            height: 50px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #004080, #0073e6);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Error Messages */
        .login-error {
            color: #cc0000;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Icon Styling */
        .icon {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- شعار الجامعة -->
        <img src="main/images/university_logo.png" alt="شعار الجامعة" class="logo">
        
        <?php
        if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
            foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                echo '<div class="login-error">', $msg, '</div>';
            }
            unset($_SESSION['ERRMSG_ARR']);
        }
        ?>
        <h1>تسجيل الدخول</h1>
        <!-- وصف إضافي -->
        <p class="login-description">مرحبًا بكم في نظام تسجيل الدخول الخاص بالتقديم لترقيات لاعضاء هيئة التدريس بجامعة الجزيرة . يرجى إدخال اسم المستخدم وكلمة المرور للمتابعة..</p>

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" required />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required />
            </div>
            <button class="btn btn-custom" type="submit">
                <i class="icon fa fa-sign-in"></i> تسجيل الدخول
            </button>
        </form>
    </div>
</body>
</html>
