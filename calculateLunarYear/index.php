<?php
    $chi = ["Tý", "Sửu", "Dần", "Mẹo", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất", "Hợi"];
    $can = ["Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm", "Quý"];
    $result = "";
    if(isset($_POST["year"])) {
        $year = $_POST["year"];
        if ($year < 0) $result .= "Lỗi nhập";
        else {
            $result .= $can[($year+6)%10]." ".$chi[($year+8)%12]; // Năm 0 là năm Canh Thân
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương trình tính năm âm lịch</title>

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
        <h2 class="heading">Chương trình tính Âm lịch từ năm Dương lịch</h2>

        <!-- Phần hiển thị -->
        <form method="post">
            <section class="section">
                <label class="label" for="year">Mời bạn nhập năm Dương lich: </label>
                <input type="number" name="year" id="year" required value="<?= !isset($year)?:$year ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Caculate">
            </section>
            <section class="section">
                <label class="label">Năm âm lịch tương ứng:</label>
                <input type="text" readonly value="<?= !isset($result)?:$result ?>">
            </section>
        </form>
    </div>
</body>

</html>