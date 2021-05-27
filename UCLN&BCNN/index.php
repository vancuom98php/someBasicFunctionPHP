<?php
    // Hàm tìm UCLN theo thuật toán Euclid
    function ucln($a, $b) {
        if ($b == 0) return $a;
        else return ucln($b, $a % $b);
    }

    // Hàm tìm bcnn
    function bcnn($a, $b) {
        return ($a * $b)/ucln($a, $b);
    }

    // Tìm ucln và bcnn từ 2 số a, b
    if(isset($_POST["a"]) && isset($_POST["b"])) {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $ucln = ucln($a, $b);
        $bcnn = bcnn($a, $b);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCLN&BCNN</title>
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
        <h2 class="heading">Chương trình tìm UCLN và BCNN</h2>
        <form method="post">
            <section class="section">
                <label class="label" for="a">Mời bạn nhập số a: </label>
                <input type="number" name="a" id="a" required min="1" value="<?= !isset($a)?:$a ?>">
            </section>
            <section class="section">
                <label class="label" for="b">Mời bạn nhập số b: </label>
                <input type="number" name="b" id="b" required min="1" value="<?= !isset($b)?:$b ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Find">
            </section>
            <section class="section">
                <label class="label">UCLN:</label>
                <input type="text" readonly value="<?= !isset($ucln)?:$ucln ?>">
            </section>
            <section class="section">
                <label class="label">BCNN:</label>
                <input type="text" readonly value="<?= !isset($bcnn)?:$bcnn ?>">
            </section>
        </form>
    </div>
</body>

</html>