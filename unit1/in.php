<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In</title>
    <a href="http://localhost/php1/count_day.php">Next page (Count_Day)<br/></a>
    <a href="http://localhost/php1/in.php">Now (In)</a>
</head>
<body>
    <br/>
    <h1 style="color: brown;">Đây là trang In</h1>
    <hr/>
<?php

$input = 5;

$a = ["KHÔNG", "MỘT", "HAI", "BA", "BỐN", "NĂM"];

if($input >= count($a) || $input < 0)
    echo "Errol";
else
    echo $a[$input]."<br> <hr>";

    ////////////////////////

$b = [
    "name" => "Vy",
    "age" => 20,
    "addr" => "Kiên Giang",
];

unset($b["name"]); // xóa key khoi mang
$b["Name"] = "Vz"; //gán key mới

// $b = [12, 43, 54, 42];

foreach($b as $key => $value){
    echo "$key - $value <br>";
}
?>

<?php
    //////////////////////
$c = "d";
$d = "e";
$e = "f";

echo ${$c}."<br>";

${$c} = 100;
echo $d;

?>

<br/>
<hr>

<?php
//Lấy data
    $name = $_POST["my_name"] ?? "Không có tên"; //?? :CheckNULL (Nếu phía trước ?? ko có giá trị thì lấy giá trị phía sau ?? và ngược lại)
    $age = $_POST["my_age"] ?? -1;
    $pwd = $_POST["pwd"] ?? "";

    echo"<h2>$name - $age tuổi </h2>"
?>
</body>
</html>
