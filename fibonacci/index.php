<?php
    // Hàm tìm ra số fibonacci thứ n
    function fibonacci($n) {
        if ($n < 0) return -1;
        else if ($n==0 || $n==1) return $n;
        else return fibonacci($n-1) + fibonacci($n-2);

    }
    
    if(isset($_POST["number"])) {
        $number = $_POST["number"];
        $result = fibonacci($number);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
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
        <h2 class="heading">Chương trình in dãy Fibonacci</h2>
        <form method="post">
            <section class="section">
                <label class="label" for="number">Mời bạn nhập vị trí số fibonacci cần tìm: </label>
                <input type="number" name="number" id="number" required value="<?= !isset($number)?:$number ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Show Fibonacci">
            </section>
            <section class="section">
                <label class="label">
                    <?php
                        echo "Số fibonacci thứ ";
                        if (isset($number) == true) 
                            echo $number;
                        else echo "?";
                        echo " là:"
                    ?>
                </label>
                <input type="text" readonly value="<?= !isset($result)?:$result ?>">
            </section>
            <section class="section">
                <label class="label">
                    <?php
                        echo "Dãy fibonacci đến ";
                        if (isset($number) == true) 
                            echo $number;
                        else echo "?";
                        echo " là:"
                    ?>
                </label>
                <input type="text" readonly value="<?php
                    if (isset($number) == true) {
                        for ($i=1; $i <= $number; $i++) {
                            echo fibonacci($i)." ";
                    }}
                ?>">
            </section>
        </form>
    </div>
</body>

</html>