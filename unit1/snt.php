<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra snt</title>
</head>

<body>

    <?php include("_handle.php"); ?>
    <?php include("_form.php"); ?>

    <?php
    if (isset($_POST["my_number"]) == true && !empty($_POST["my_number"])) {
        $num = $_POST["my_number"];
        // $count = 0;

        /* 
        $isPrimeNumber = true;
        if($num == 1 || $num == 2 || $num == 3){
            $isPrimeNumber = true;
        } 
        else if($num > 3){
            for($i = 2; $i <= sqrt($num); $i++){
               if($num % $i == 0)
                    // $count++; 
                    $isPrimeNumber = false;
                    break;
            }
        }
        else if($num < 2){
            $isPrimeNumber = false;
        }

        // if($count != 0){
        //     echo "<h2>$num không là số nguyên tố</h2>";
        // }
        // else{
        //     echo "<h2>$num là số nguyên tố</h2>";
        // }
        
        if($isPrimeNumber){
            echo "<h2>$num là số nguyên tố</h2>";
        }
        else{
            echo "<h2>$num không là số nguyên tố</h2>";
        }

        */

        if (checkPrimeNumber($num)) {
            echo "<h2>$num là số nguyên tố</h2>";
        } else {
            echo "<h2>$num không là số nguyên tố</h2>";
        }
    }

    ?>

</body>

</html>