<?php
if (isset($_POST['edit'])) {
    $var1 = "100";
    $var2 = $_POST['var2'];
    $var3 = $var1 - $var2;
    echo $var3;
    
} else {
    echo "خطأ: لم يتم تنشيط العملية";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <button class="bt1" name="edit">تعديل</button>
        <input type="text" name="var2">
    </form>
</body>
</html>