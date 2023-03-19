<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count_Day</title>
    <a href="http://localhost/php1/in.php">Next page (In)<br/></a>
    <a href="http://localhost/php1/count_day.php">Now (Count_Day)</a>
</head>
<body>
    <br/>
    <h1 style="color: brown">Đây là trang Count_Day</h1>
    <hr/>

    <form action="in.php" method="post">
        <!-- method = "get" là mặc định, đc hiển thị trên thanh địa chỉ
            method = "post" Ko hiển thị như get (bị ẩn) và thích hợp để gửi những tài liệu quan trọng -->
        
        <label for="my_name">Nhập Tên: </label>
        <input type="text" id="my_name" name="my_name">
        <!-- <br/>
        <textarea name="" id="" cols="30" rows="10"></textarea> -->
        <br/><br/>

        <label for="pwd">Nhập password: </label>
        <input type="password" id="pwd" name="pwd">
        
        <br/><br/>
       
        <label for="my_age">Nhập Tuổi: </label>
        <input type="number" min="1" max="999" id="my_age" name="my_age">
        
        <br/><br/>
        
        <!-- <button>Gửi data</button> -->
        <input type="submit" value="Gửi data">
        <input type="reset" value="Reset">
    </form>

    <br/><hr/>
    <?php

$input = 2;
$year = 2005;

// if($input == 1 || $input == 3 || $input == 5 || $input == 7 || $input == 8 || $input == 10 || $input == 12)
//     echo "Thang ". $input . " Co 31 NGAY";

// else if($input == 4 || $input == 6 || $input == 9 || $input == 11)
//     echo "Thang ". $input . " Co 30 NGAY";

// else if($input == 2){
//     if($year % 4 == 0 && $year % 100 != 0)
//         echo "Thang ". $input . " Co 29 NGAY";
//     else
//         echo "Thang ". $input . " Co 28 NGAY";
// }

// else
//     echo "Errol";


//array
$day = [31, 28, 30, 31, 30, 31, 30, 31, 30, 31, 30, 31];


// // Thêm phần tử vào cuối mảng
// $day[] = 32; //Cách 1
// array_push(33); // cách 2

if($input < 1 || $input > count($day))
    echo "Errol";
else if($input == 2){
    if($year % 4 == 0 && $year % 100 != 0)
        echo "Thang ".$input." Co " .[$day[$input - 1] + 1]." ngay";
    else
        echo "Thang ".$input." Co " .$day[$input - 1]." ngay";
}
else
    echo "Thang ".$input." Co " .$day[$input - 1]." ngay";
    ?>
</body>
</html>
