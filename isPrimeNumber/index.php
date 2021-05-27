<?php
    // Hàm kiểm tra số nguyên tố
    function isPrimeNumber($number) {
        if ($number < 2) {
            return false;
        }
        for ($i=2; $i <= sqrt($number); $i++) {
            if (($number%$i==0))
                return false;
        }
        return true;
    }

    // Dùng hàm để kiểm tra số đã nhập
    if(isset($_POST["number"])) {
        $number = $_POST["number"];
        $result = "";
        if (isPrimeNumber($number)) {
            $result.=$number." Là số nguyên tố";
        }
        else {
            $result.=$number." Không phải là số nguyên tố";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương trình kiểm tra số nguyên tố</title>

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
        <h2 class="heading">Chương trình kiểm tra số nguyên tố</h2>

        <!-- Phần hiển thị -->
        <form method="post">
            <section class="section">
                <label class="label" for="number">Mời bạn nhập 1 số nguyên cần kiểm tra:</label>
                <input type="number" name="number" id="number" required value="<?= !isset($number)?:$number ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Check">
            </section>
            <section class="section">
                <label class="label">Kết quả:</label>
                <input type="text" readonly value="<?= !isset($result)?:$result ?>">
            </section>
        </form>
    </div>
</body>

</html>