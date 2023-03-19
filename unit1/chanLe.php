<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra số chẵn lẻ</title>
</head>
<body>
    <form method="get">
        <label for="my_number">Nhập số: </label>
        <input type="text" name="my_number" id="my_name">
        <input type="submit" value="Kiểm tra">
    </form>

    <?php
    if(isset($_GET["my_number"]) == true){
        $num = $_GET["my_number"];
        if($num%2 == 0)
            echo "<h2>$num là số chẵn</h2>";
        else
            echo "<h2>$num là số lẻ</h2>";
    }

    ?>

</body>
</html>
