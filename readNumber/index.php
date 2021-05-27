<?php
    // Hàm đọc cụm 3 số
    function readThreeNumber($number) {
        $chuSo = ["", "Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín"];
        $hundred = floor($number / 100);
        $ten = floor(($number % 100) / 10);
        $unit = $number % 10;
        $str = "";
        if($number == 0) $str .= $chuSo[0];
        if($hundred > 0) {
            $str .= $chuSo[$hundred]." Trăm ";
        }
        if($ten > 0) {
            if($ten == 1) $str .= "Mười ";
            else $str .= $chuSo[$ten]." Mươi ";
        }
        if ($unit > 0) {
            if ($ten == 0 && $hundred != 0) $str .= "Lẻ ";
            if ($unit == 1 && $ten > 1) $str .= "Mốt";
            elseif ($unit == 5 && $ten != 0) $str .= "Lăm";
            else $str .= $chuSo[$unit];
        }
        return $str;
    }

    // Hàm đọc các hàng
    function readNumber($number) {
        $hang = ["Tỷ ", "Triệu ", "Nghìn "];
        $units = $number%1000;
        $thou = floor($number / 1000) % 1000;
        $mill = floor($number / 1000000) % 1000;
        $bill = floor($number / 1000000000) % 1000;
        $str = "";
        if($number == 0) $str .= "Không";
        if($number < 0) {
            $str = "Trừ ";
            $number = -$number;
        }
        if($bill > 0) {
            $str .= readThreeNumber($bill)." ".$hang[0]; 
        }
        if($mill > 0) {
            if($bill > 0 && $mill < 100) $str .="Không Trăm ";
            $str .= readThreeNumber($mill)." ".$hang[1]; 
        }
        if($thou> 0) {
            if($mill > 0 && $thou < 100) $str .="Không Trăm ";
            $str .= readThreeNumber($thou)." ".$hang[2]; 
        }
        if($units > 0) {
            if($thou > 0 && $units < 100) $str .="Không Trăm ";
            $str .= readThreeNumber($units); 
        }
        return $str;
    }

    // Đọc thành chữ từ số đã nhập vào
    if(isset($_POST["number"])) {
        $number = $_POST["number"];
        $result = readNumber($number);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương trình đọc số</title>

    <!-- CSS cho phần nội dung html -->
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
        width: 35%;
        float: left;
        font-weight: bold;
    }

    input,
    textarea {
        text-indent: 5px;
        width: 40%;
        font-size: 18px;
    }

    textarea {
        overflow: auto;
        height: 80px;
    }

    .submit {
        width: 15%;
    }
    </style>
</head>

<body>
    <div class="display">
        <h2 class="heading">Chương trình đọc số thành chữ</h2>

        <!-- Phần hiển thị -->
        <form method="post">
            <section class="section">
                <label class="label" for="number">Mời bạn nhập số nguyên: </label>
                <input type="number" name="number" id="number" required value="<?= !isset($number)?:$number ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Read">
            </section>
            <section class="section">
                <label class="label">Đọc thành chữ:</label>
                <textarea readonly="readonly"><?= !isset($result)?:$result ?></textarea>
            </section>
        </form>
    </div>
</body>

</html>