<?php
   //الاتصال بقاعدة البيانات
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'loan_db2';
   $con = mysqli_connect($host,$user,$pass,$db);
   $res = mysqli_query($con,"select * from loan2");
   
   ?>