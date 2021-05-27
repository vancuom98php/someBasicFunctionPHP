<?php

    // Hàm chuyển đổi Decimal sang cơ sô b bất kỳ nhỏ hơn 16
    function convertDec($number, $b) {
        if ($number < 0 || $b < 2 || $b > 16)
        return "Lỗi nhập";
        else {
            $str = "";
            $m = 0;
            $n=$number;
            while($n > 0) { 
                $m = $n % $b;
                if($m >= 10) $str.= chr(55 + $m);
                else $str.= $m;
                $n = floor($n/$b);
            }
        }
        $str = strrev($str);
        return $str;
    }

    if(isset($_POST["number"]) && $_POST["b"]) {
        $number = $_POST["number"];
        $b = $_POST["b"];
        $result = convertDec($number, $b);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Decimal</title>
    <style>
    html {
        background: url(https://www.dammio.com/wp-content/uploads/2019/02/php_functions.png) no-repeat scroll;
        background-size: cover;
    }

    .display {
        width: 60%;
        padding: 10px;
        margin: 100px auto;
    }

    .section {
        margin: 10px 0;
        font-size: 18px;
    }

    .heading {
        text-align: center;
    }

    .label {
        display: block;
        width: 40%;
        float: left;
        font-weight: bold;
    }

    input {
        text-indent: 5px;
        width: 30%;
        font-size: 18px;
        overflow-x: auto;
    }
    </style>
</head>

<body>
    <div class="display">
        <h2 class="heading">Chương trình chuyển đổi cơ số 10 sang cơ số bất kỳ nhỏ hơn 16</h2>
        <form method="post">
            <section class="section">
                <label class="label" for="number">Mời bạn nhập số hệ 10: </label>
                <input type="number" name="number" id="number" required value="<?= !isset($number)?:$number ?>">
            </section>
            <section class="section">
                <label class="label" for="b">Mời bạn nhập hệ cơ số muốn chuyển đổi: </label>
                <input type="number" name="b" id="b" required value="<?= !isset($b)?:$b ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Convert">
            </section>
            <section class="section">
                <label class="label">Kết quả:</label>
                <input type="text" readonly value="<?= !isset($result)?:$result ?>">
            </section>
        </form>
    </div>
</body>

</html>