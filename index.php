<?php
// التحقق من إرسال النموذج
if (isset($_POST['submit'])) {
    // القيم المرجعية لاسم المستخدم وكلمة المرور
    $username = 'admin';
    $password = 'admin';

    // استلام القيم المدخلة من النموذج
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // التحقق من صحة اسم المستخدم وكلمة المرور
    if ($enteredUsername === $username && $enteredPassword === $password) {
        // تسجيل الدخول بنجاح
        header('Location: home.php');
        exit;
    } else {
        // فشل تسجيل الدخول
        echo 'فشل تسجيل الدخول. يرجى التحقق من اسم المستخدم وكلمة المرور.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title> تسجيل الدخول</title>
</head>
<body>
    <h2> تسجيل الدخول</h2>
    <form method="POST" action="">
        <label for="username">اسم المستخدم:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">كلمة المرور:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="submit" value="تسجيل الدخول">
    </form>
</body>
</html>