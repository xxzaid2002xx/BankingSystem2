<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view.css">
    <title>Document</title>
    <style>
        .soll {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  h1 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  span {
    font-size: 18px;
    margin-bottom: 10px;
  }

  input[name="var2"] {
    padding: 5px;
    margin-bottom: 10px;
  }

  button[name="soll"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
  }
    </style>
</head>
<body>
   
    
    <?php
  $dolar = $_GET['dolar'];
  $date = $_GET['date'];
  $numer = $_GET['numer'];
  $cut = $_GET['cut'];
  $months = $_GET['months'];
  $total = $_GET['total'];
  $name = $_GET['name']; 
    ?>
    <div class="asid">
        <div class="title">
            <h1>معلومات الزبون</h1>
        </div>
        <span>الاسم</span><br><span><?php echo $name; ?></span> 
        <hr>
        <span>رقم الهاتف</span><br><span><?php echo $numer; ?></span>
        <hr>
        <span>المبلغ الكلي</span><br><span><?php echo $total; ?></span>
        <hr>
        <span>الاستقطاع</span><br><span><?php echo $cut; ?></span>
        <hr>
        <span>تاريخ الانشاء</span><br><span><?php echo $date; ?></span>
        <hr>
        <span>عدد الاشهر</span><br><span><?php echo $months; ?></span>
        <hr>
        <span>المتبقي</span><br><span><?php echo $dolar; ?></span>
        <hr>
        <span>الناتج الجديد</span><br><span><?php //echo $dolar2; ?></span>
        <hr>
        
        <br>
        
        <form method="post">
        <button class="bt1" name="edit">تعديل</button>
    </form>
        <a href="home.php"><button class="bt2" name="del">رجوع</button></a> 
    </div>

    <div class="main">
        <div class="head">
        <form method="post">
    <!-- مكان الجدول في الصفحة -->

    <div class="soll">
    <?php
    if (isset($_POST['soll'])) {
        $var2 = $_POST['var2'];
        $dolar = $dolar - $var2 ;

        include "db_connect.php";

        // إجراء استعلام التحديث
        $sql = "UPDATE lona2 SET dolar = '$dolar' WHERE NAME = '$name'";

        // قم بتنفيذ الاستعلام والتحقق من نجاحه
        if ($con->query($sql) === TRUE) {
            echo "تم تحديث القيمة بنجاح";
        } else {
            echo "حدث خطأ في تحديث القيمة: " . $con->error;
        }

        // أغلق اتصال قاعدة البيانات
        $con->close();
    }
?>

    <h1>ناتج المتبقي</h1>
    <span></span><span><?php echo $dolar; ?> - <input type="text" name="var2"></span> 
    <button name="soll">الناتج</button>
    <br>
    </div>

    <table class="table1">
        <thead>
            <tr>
                <th>تاريخ التسديد</th>
                <th>الاستقطاع</th>
               
            </tr>
        </thead>
        <tbody id="tbody">
    <?php
    
   

    session_start(); // بدء الجلسة

   

    if (isset($_POST['ok'])) { // تحقق مما إذا تم النقر على الزر "تم"
        $in1 = $_POST['in1']; // الحصول على المصفوفة المدخلة في حقل in1
        $in2 = $_POST['in2']; // الحصول على المصفوفة المدخلة في حقل in2

        
        $_SESSION['in1'] = $in1; // حفظ القيم في الجلسة
        $_SESSION['in2'] = $in2;
    } else {
        // استعادة القيم من الجلسة إذا لم يتم النقر على الزر "تم"
        $in1 = $_SESSION['in1'] ?? [];
        $in2 = $_SESSION['in2'] ?? [];
        
    }


    
    if (isset($_POST['edit'])) {
    
    }
    ?>

<?php
for ($i = 1; $i <= $months; $i++) {
    ?>
    
    <tr>
        <td><input type="text" name="in1[]" value="<?php echo $in1[$i-1] ?? ''; ?>"></td>
        <td><input id = "v" type="text" name="in2[]" value="<?php echo $in2[$i-1] ?? ''; ?>"></td>
        <th><button name="ok">تم</button></th>
        <th><?php echo $i ?></th>
    </tr>
<?php
}
?>
</tbody>
    </table>
</form>
        </div>
    </div>

</body>
</html>