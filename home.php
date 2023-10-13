<?php
include "db_connect.php";

if (isset($_POST['del'])) {
    $name = $_POST['name'];
    $sql = "DELETE FROM loan2 WHERE name = '$name'";
    mysqli_query($con, $sql);
    
    // توجيه المستخدم بعد حذف السجل
    
    header("Location: home.php");
    
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="haed">
    <h3> المهندس زيد عبدالله</h3>
    <h4> 07715204894للصيانة والاستسفار </h4>

    <a href="add new custemrs.php"> <button id="creat">اضافة زبون جديد</button></a> <br><br><br>
    <form method="post" action="home.php"> 
        <input type="text" class="inSearch" placeholder="اسم الزبون" name="name" >
        <br><br>
        <button class="btSearch" name="del">حذف</button>
        <button class="btSearch" name="ser" >بحث</button>
       
    </form>
</div>

    <div class="body">
        <div class="bodyhaed">
            <h1 class="text">الاحصائيات</h1>
        </div>

        <div class="card">
            <div class="cardhaed">
                <h1>المبالغ الكلية</h1>
            </div>
            <div class="cardbody">
            <?php
            include "db_connect.php";
            $sql = "SELECT SUM(total) AS totalSum FROM loan2";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalSum = $row['totalSum'];
            mysqli_close($con);
            ?>
                <h1><?php echo $totalSum; ?></h1>
            </div>
        </div>

        <div class="card">
            <div class="cardhaed">
                <h1>مجموع الاستقطاعات</h1>
            </div>
            <div class="cardbody">
            <?php
            include "db_connect.php";
            $sql = "SELECT SUM(cut) AS totalcut FROM loan2";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalcut = $row['totalcut'];
            mysqli_close($con);
            ?>
                <h1><?php echo $totalcut; ?></h1>
            </div>
        </div>

        <div class="card">
            <div class="cardhaed">
                <h1>المتبقي </h1>
            </div>
            <div class="cardbody">
           <?php
            include "db_connect.php";
            $sql = "SELECT SUM(dolar) AS totaldolar FROM loan2";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $totaldolar = $row['totaldolar'];
            mysqli_close($con);
            ?>
                <h1><?php echo $totaldolar; ?></h1>
            </div>
        </div>

        <div class="card">
            <div class="cardhaed">
                <h1>عدد الزبائن</h1>
            </div>
            <div class="cardbody">

            <?php
            include "db_connect.php";
            $sql = "SELECT COUNT(*) AS count FROM loan2";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalCustomers = $row['count'];
            mysqli_close($con);
            ?>
                <h1><?php echo $totalCustomers; ?></h1>.
            </div>
        </div>
    </div>

    <div class="foot">
        <table class="table1">   
            <thead>
                <tr>
                    <th>المتبقي</th>
                    <th>تاريخ الانشاء</th>
                    <th>رقم الهاتف</th>
                    <th>الاستقطاع</th>
                    <th>عدد الاشهر</th>
                    <th>المبلغ الكلي</th>
                    <th>اسم الزبون</th>
                    <th>التفاصيل</th>
                </tr>
            </thead>
            <tbody id="tbody">
           <?php
            include "db_connect.php";

            if (isset($_POST['ser'])) {
                $name = mysqli_real_escape_string($con, $_POST['name']);
            
                $sql = "SELECT * FROM loan2 WHERE name = '$name'";
                $result = mysqli_query($con, $sql);
            
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    // استخدم البيانات المسترجعة كما ترغب
            
                    echo "<tr>";
                echo "<td>".$row['dolar']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['numer']."</td>";
                echo "<td>".$row['cut']."</td>";
                echo "<td>".$row['months']."</td>";
                echo "<td>".$row['total']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td><a href='view.php?dolar=".$row['dolar']."&date=".$row['date']."&numer=".$row['numer']."&cut=".$row['cut']."&months=".$row['months']."&total=".$row['total']."&name=".$row['name']."'><button class='btSearch'>التفاصيل</button></a></td>";
                echo "</tr>";
                    // استمر في طباعة البيانات الأخرى حسب الحاجة
                } else {
                    echo "لا توجد نتائج مطابقة.";
                }
            }

            $sql = "SELECT * FROM loan2";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['dolar']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['numer']."</td>";
                echo "<td>".$row['cut']."</td>";
                echo "<td>".$row['months']."</td>";
                echo "<td>".$row['total']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td><a href='view.php?dolar=".$row['dolar']."&date=".$row['date']."&numer=".$row['numer']."&cut=".$row['cut']."&months=".$row['months']."&total=".$row['total']."&name=".$row['name']."'><button class='btSearch'>التفاصيل</button></a></td>";
                echo "</tr>";
            }
            mysqli_close($con);
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>