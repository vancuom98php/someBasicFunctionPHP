<?php
    // Hàm kiểm tra năm
    function checkYear($year) {
        return ($year < 0)? false : true;
    }

    // Hàm kiểm tra tháng 
    function checkMonth($month) {
        return (($month < 1) || ($month > 12))? false : true;
    }

    // Hàm kiểm tra năm nhuận
    function checkLapYear($year) {
        return (($year%400==0) || (($year%4==0) && ($year%100 != 0)))? true : false;
    }
    
    // Hàm kiểm tra ngày
    function checkDay($year, $month, $day) {
        $check = true;
        if ($day < 1) $check = false;
        if ($month == 2) {
            if (checkLapYear($year) && ($day > 29)) $check = false;
            elseif (!checkLapYear($year) && ($day > 28)) $check = false;
        }
        else if (($month==1 || $month==3 || $month==5 || $month==7 || $month==8 || $month==10 || $month==12) && ($day>31)) $check = false;
        else if (($month==4 || $month==6 || $month==9 || $month==11) && ($day>30)) $check = false;
        return $check;
    }

    // Hàm tính thứ trong tuần
    function calculateDate($year, $month, $day) {
        if ($month < 3) {
            $month += 12;
            $year--;
        }
        $date = (abs($day + 2*$month + 3*($month + 1)/5 + $year + $year/4) % 7);
        return $date;
    }

    // Tìm thứ trong tuần từ các số liệu đã nhập
    if(isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"])) {
        $day = $_POST["day"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        $date = calculateDate($year, $month, $day);
        $result = "";
        if ((checkYear($year) == false) || (checkMonth($month) == false) || (checkDay($year, $month, $day) == false)) 
            $result .= "Lỗi nhập";
        else {
            switch ($date) {
                case 0:
                    $result .= "Chủ Nhật";
                    break;
                case 1:
                    $result .= "Thứ Hai";
                    break;
                case 2:
                    $result .= "Thứ Ba";
                    break;
                case 3:
                    $result .= "Thứ Tư";
                    break;
                case 4:
                    $result .= "Thứ Năm";
                    break;
                case 5:
                    $result .= "Thứ Sáu";
                    break;
                case 6:
                    $result .= "Thứ Bảy";
                    break;
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
    <title>Calculate Day</title>
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

    .label {
        display: block;
        width: 20%;
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
        <h2 class="heading">Chương trình tìm thứ khi đã biết ngày tháng năm</h2>
        <form method="post">
            <section class="section">
                <label class="label" for="day">Nhập ngày: </label>
                <input type="number" name="day" id="day" required value="<?= !isset($day)?:$day ?>">
            </section>
            <section class="section">
                <label class="label" for="month">Nhập tháng: </label>
                <input type="number" name="month" id="month" required value="<?= !isset($month)?:$month ?>">
            </section>
            <section class="section">
                <label class="label" for="year">Nhập năm: </label>
                <input type="number" name="year" id="year" required value="<?= !isset($year)?:$year ?>">
            </section>
            <section class="section">
                <label class="label">&nbsp;</label>
                <input class="submit" type="submit" value="Check">
            </section>
            <section class="section">
                <label class="label">Thứ tương ứng: </label>
                <input type="text" readonly value="<?= !isset($result)?:$result ?>">
            </section>
        </form>
    </div>
</body>

</html>