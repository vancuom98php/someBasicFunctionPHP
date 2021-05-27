<?php
    if(isset($_POST["number"])) {
        $number = $_POST["number"];
        $result = "";
        if ($number < 2) $result .= "Lỗi nhập";
        else {
            for ($i = 2; $i <= $number; $i++) {
                $count = 0;
                while (($number%$i) == 0) {
                    $count++;
                    $number /= $i;
                }
                if($count) {
                    if ($count > 1) $result .= $i."^".$count;
                    else $result .= $i;
                    if($number > $i) $result.="*";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương trình phân tích thừa số nguyên tố</title>

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

    input {
        text-indent: 5px;
        width: 40%;
        font-size: 18px;
    }

    .submit {
        width: 15%;
    }
    </style>
</head>

<body>
    <div class="display">
        <h2 class="heading">Chương trình phân tích thừa số nguyên tố</h2>

        <!-- Phần hiển thị -->
        <form method="post">
            <section class="section">
                <label class="label" for="number">Mời bạn nhập 1 số nguyên cần phân tích</label>
                <input type="number" name="number" id="number" required
                    value="<?= !isset($_POST["number"])?:$_POST["number"] ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Caculate">
            </section>
            <section class="section">
                <label class="label">Kết quả:</label>
                <input type="text" readonly value="<?= !isset($result)?:$result ?>">
            </section>
        </form>
    </div>
</body>

</html>