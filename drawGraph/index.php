<?php
    // Hàm vẽ tam giác đặc
    function solidTriangle($h) {
        $k = 1;
        $str = "";
        while ($h > 0) {
            for ($i = 1; $i < $h; $i++)
                $str .= "   ";
            for ($j = 1; $j <= $k; $j++)
                $str .= " * ";
            $str .= "\n";
            $k += 2;
            $h--;
        }
        return $str;
    }

    // Hàm vẽ tam giác rỗng
    function hollowTriangle($h) {
        $k = $h - 1;
        $str= "";
        for ($i = 0; $i < $h - 1; $i++) {
            for ($j = 0; $j < (2*$h - 1); $j++) {
                if(($j == $k - $i) || ($j == $k + $i))
                    $str .= " * ";
                else $str .= "   ";
            }
            $str .= "\n";
        }
        for ($j = 0; $j < (2*$h - 1); $j++)
            $str .= " * ";
        return $str;
    }

    // Hàm vẽ hình vuông rỗng
    function hollowSquare($h) {
        $str = "";
        for($i = 1; $i <= $h; $i++) {
            if (($i == 1) || ($i == $h)) {
                for($j = 1; $j <= $h; $j++)
                    $str .= " * ";
            }
            else {
                for($j = 1; $j <= $h; $j++) {
                    if (($j == 1) || ($j == $h)) 
                        $str .=  " * ";
                    else $str .= "   ";
                }
            }
            $str .= "\n";
        }
        return $str;
    }

    // Vẽ các tam giác đặc từ chiều cao đã nhập
    if(isset($_POST["height"]) && isset($_POST["draw1"])) {
        $h = $_POST["height"];
        $result = "";
        $result .= solidTriangle($h);
    }

    // Vẽ các tam giác rỗng từ chiều cao đã nhập
    if(isset($_POST["height"]) && isset($_POST["draw2"])) {
        $h = $_POST["height"];
        $result = "";
        $result .= hollowTriangle($h);
    }

    // Vẽ các hình vuông rỗng từ chiều cao đã nhập
    if(isset($_POST["height"]) && isset($_POST["draw3"])) {
        $h = $_POST["height"];
        $result = "";
        $result .= hollowSquare($h);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draw Graph</title>

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

    textarea {
        width: 40%;
        font-size: 18px;
        padding-left: 5px;
        overflow: auto;
        min-height: 80px;
    }

    .submit {
        padding: 2px 10px;
    }
    </style>
</head>

<body>
    <div class="display">
        <h2 class="heading">Chương trình vẽ hình học</h2>

        <!-- Phần hiển thị -->
        <form method="post">
            <section class="section">
                <label class="label" for="height">Mời bạn nhập chiều cao: </label>
                <input type="number" name="height" id="height" required value="<?= !isset($h)?:$h ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" name="draw1" value="Draw Solid Triangle">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" name="draw2" value="Draw Hollow Triangle">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" name="draw3" value="Draw Hollow Square">
            </section>
            <section class="section">
                <label class="label">Draw Graph:</label>
                <textarea readonly="readonly"><?= !isset($result)?:$result ?></textarea>
            </section>
        </form>
    </div>
</body>

</html>