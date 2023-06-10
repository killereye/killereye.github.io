<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
    <style>
        .header_orderform {
            text-align: center;
            font-size: 20px;
            width: 100%;
            background-color: #d27400;
            margin-top: -30px;
            margin-left: -8px;
            padding-right: 16px;
            padding-bottom: 10px;
            padding-top: 30px;
            color: white;
            font-family: Copperplate;
        }

        .calculation {
            text-align: center;
            font-size: 20px;
            width: 100%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        #order_form {
            width: 30%;
            text-align: center;
            font-size: 20px;
            box-shadow: 0px 0px 2px gray;
            border-style: hidden;
            border-radius: 10px;
            background-color: #fffdd0;
            padding-top: 10px;
        }

        #submit_button {
            height: 50px;
            width: 100px;
            border-radius: 10px;
        }

        #submit_button:hover {
            background-color: #08d756;
        }

        .table_class {
            text-shadow: 2px 2px 10px black;
            font-size: 50px;
        }

        #left_section {
            width: 35%;
        }

        #right_section {
            width: 35%;
        }

        #main_holder {
            width:100%;
            padding-top: 20px;
            display:flex;
        }

        .text_field {
            border-radius: 5px;
            border-color: gray;
            border-style: solid;
            width: 100px;
        }

        label {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;;
        }
    </style>
</head>
<body style="background-color: #ffe4c4;">
    <form method="post">
        <div class="header_orderform">
            <h1>Order Form</h1>
        </div>
        <div id="main_holder">
            <div id="left_section"></div>
            <div id="order_form">
                    <label for="item1">Netflix (₱100/month):</label><br>
                    <input class="text_field" type="number" name="month1" placeholder="Month/s" min="1" max="2"> <input class="text_field" type="number" name="quantity1" placeholder="Quantity"> <br><br>

                    <label for="item2">Quillbot (₱30/month):</label><br>
                    <input class="text_field" type="number" name="month2" placeholder="Month/s" min="1" max="3"> <input class="text_field" type="number" name="quantity2" placeholder="Quantity"> <br><br>

                    <label for="item3">Grammarly (₱40/month):</label><br>
                    <input class="text_field" type="number" name="month3" placeholder="Month/s" min="1" max="3"> <input class="text_field" type="number" name="quantity3" placeholder="Quantity"> <br><br>

                    <label for="item4">Canva (₱30/month):</label><br>
                    <input class="text_field" type="number" name="month4" placeholder="Month/s" min="1" max="3"> <input class="text_field" type="number" name="quantity4" placeholder="Quantity"> <br><br>

                    <label for="item5">YouTube Premium (₱20/month):</label><br>
                    <input class="text_field" type="number" name="month5" placeholder="Month/s" min="1" max="4"> <input class="text_field" type="number" name="quantity5" placeholder="Quantity"> <br><br>

                    <label for="arrival">Preferred Arrival Date and Time:</label><br>
                    <input class="text_field" type="datetime-local" name="arrival" 
                    min="<?php $current_date = new DateTime(null, new DateTimeZone('Asia/Manila'));echo $current_date->format('Y-m-d\TH:i');?>" required><br><br>

                    <input type="submit" id="submit_button" value="Submit Order"><br><br>
                </div>
                <div id="right_section"></div>
        </div>

        <br>

        <div class="calculation">
            <?php

                $netflix_price = 100;
                $quillbot_price = 30;
                $grammarly_price = 40;
                $canva_price = 30;
                $youtube_price = 20;

                $total_price = 0;


                if ($_POST['month1'] > 0){
                    $month1 = $_POST['month1'];
                    if ($_POST['quantity1'] > 0){
                        $quantity1 = $_POST['quantity1'];

                        echo "Netflix: ", ($month1 * $quantity1) * $netflix_price, "<br>";
                        $total_price = $total_price + (($month1 * $quantity1) * $netflix_price);
                    }
                }

                if ($_POST['month2'] > 0){
                    $month2 = $_POST['month2'];
                    if ($_POST['quantity2'] > 0){
                        $quantity2 = $_POST['quantity2'];
                        echo "Quillbot: ", ($month2 * $quantity2) * $quillbot_price, "<br>";
                        $total_price = $total_price + (($month2 * $quantity2) * $quillbot_price);
                    }
                }

                if ($_POST['month3'] > 0){
                    $month3 = $_POST['month3'];
                    if ($_POST['quantity3'] > 0){
                        $quantity3 = $_POST['quantity3'];
                        echo "Grammarly: ", ($month3 * $quantity3) * $grammarly_price, "<br>";
                        $total_price = $total_price + (($month3 * $quantity3) * $grammarly_price);
                    }
                }

                if ($_POST['month4'] > 0){
                    $month4 = $_POST['month4'];
                    if ($_POST['quantity4'] > 0){
                        $quantity4 = $_POST['quantity4'];
                        echo "Canva: ", ($month4 * $quantity4) * $canva_price, "<br>";
                        $total_price = $total_price + (($month4 * $quantity4) * $canva_price);
                    }
                }

                if ($_POST['month5'] > 0){
                    $month5 = $_POST['month5'];
                    if ($_POST['quantity5'] > 0){
                        $quantity5 = $_POST['quantity5'];
                        echo "YouTube: ", ($month5 * $quantity5) * $youtube_price, "<br>";
                        $total_price = $total_price + (($month5 * $quantity5) * $youtube_price);
                    }
                }

                echo "Your Total Bill is: ", $total_price;
            ?>
        </div>
        <br>
        <div class="calculation">
            <?php
                // Assuming your server default timezone is not 'Asia/Manila'

                $defaultTz = date_default_timezone_get();  // Get the default timezone
                $arrival = $_POST['arrival'];

                // Current date and time
                $current_date = new DateTime();
                $current_date->setTimezone(new DateTimeZone('Asia/Manila'));

                // Create the DateTime object for the arrival date in UTC, then convert it to 'Asia/Manila'
                $arrival_date = new DateTime($arrival, new DateTimeZone('Asia/Manila'));

                echo "Order Time: " . $current_date->format('l, M d Y @ h:i A e') . " Time <br>";
                echo "Preferred Arrival Date: " . $arrival_date->format('l, M d Y @ h:i A e') . " Time <br>";
            ?>
        </div>
        

    </form>
</body>
</html>
