<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="add new custemrs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

// استدعاء ملف الاتصال بقاعدة البيانات
include "db_connect.php";

// متغيرات الأزرار
$name = '';
$dolar = '';
$number = '';
$total = '';
$months = '';
$date = '';
$cut = '';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['dolar'])) {
    $dolar = $_POST['dolar'];
}
if (isset($_POST['number'])) {
    $number = $_POST['number'];
}
if (isset($_POST['total'])) {
    $total = $_POST['total'];
}
if (isset($_POST['months'])) {
    $months = $_POST['months'];
}
if (isset($_POST['date'])) {
    $date = $_POST['date'];
}
if (isset($_POST['cut'])) {
    $cut = $_POST['cut'];
}

if (isset($_POST['add'])) {
    $sql = "insert into loan2 value('$name','$dolar','$number','$total','$months','$date','$cut')";
    mysqli_query($con, $sql);
    header("Location: home.php");
    // إغلاق اتصال قاعدة البيانات
    mysqli_close($con);
}

?>


<h1>اسم الزبون</h1>
<form method="post">
    <input type="text" class="input-creat" placeholder="اسم الزبون" name="name">
    <h1>$الدولار</h1>
    <input type="number" class="input-creat" placeholder="الدولار $" name="dolar">
    <h1>رقم الهاتف</h1>
    <input type="number" class="input-creat" placeholder="رقم الهاتف" name="number">
    <h1>المبالغ الكلي</h1>
    <input type="number" class="input-creat" placeholder="المبلغ الكلي" name="total">
    <h1>عدد الاشهر</h1>
    <input type="number" class="input-creat" placeholder="عدد الاشهر" name="months">
    <h1>تاريخ الانشاء</h1>
    <input type="date" class="input-creat" placeholder="تاريخ الانشاء" name="date"> 
    <h1>الاستقطاع الشهري</h1>
    <input type="number" class="input-creat" placeholder="الاستقطاع الشهري" name="cut"> 
    <br>
    <button type="submit" id="creat" name="add">اضافة</button>
    <a href="home.php"><button id="back">رجوع</button></a>
   
</form>
        
</body>
</html>