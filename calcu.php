<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>calculator</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrap">
        <form action="calcu.php" method="post">
            <?php

                //ACを押したら
                if($_POST["ac"] === "AC"){
                    $set = 0;
                }

                //%を押したら
                if($_POST["per"] === "%"){

                    //1つ目の数字
                    // if($_POST["first"]){
                    //     $set=$set/100;
                    // }

                    // //2つ目の数字
                    // if($_POST["first"]){
                    //     $set=$set/100;
                    // }

                    //計算結果の数字
                    $set = $set / 100;
                    // echo "<input type='number' value='".$set."' >";
                }

                if($_POST["plm"] === "+/-"){
                    $set = -$set;
                    // echo "<input type='number' value='".$set."' >";
                }

                //=を押したら
                if(isset($_POST["result"])) {
                    //足し算
                    if($_POST["symbol"] === "+"){
                        $set = $_POST["first"] + $_POST["second"];
                        echo "<input type='text' value='$set' name='second'>";
                    }

                    //引き算
                    if($_POST["symbol"] === "-"){
                        $set = $_POST["first"] - $_POST["second"];
                        echo "<input type='text' value='$set' name='second'>";
                    }

                    //掛け算
                    if($_POST["symbol"] === "×"){
                        $set = $_POST["first"] * $_POST["second"];
                        echo "<input type='text' value='$set' name='second'>";
                    }

                    //割り算
                    if($_POST["symbol"] === "÷"){
                        $set = $_POST["first"] / $_POST["second"];
                        echo "<input type='text' value='$set' name='second'>";
                    }
                }else{
                    //記号押されたら(+,-,*,/)
                    if(isset($_POST["symbol"])){
                        //1つ目の数字
                        if(isset($_POST["first"])){
                            echo "<input type='text' value='".$_POST["first"]."' name='first'>";
                            echo "<input type='text' value='".$_POST["symbol"]."' name='symbol'>";

                            //2つ目の数字
                            if(isset($_POST["second"])){
                                $set=$_POST["second"].$_POST["number"];
                                echo "<input type='text' value='$set' name='second'>";
                           
                            }else{
                                echo "<input type='text' value=".$_POST["number"]." name='second'>";
                            }
                        }else{
                            echo "<input type='text' value=".$_POST["second"]." name='first'>";
                            echo "<input type='text' value=".$_POST["symbol"]." name='symbol'>";
                        }
                    }else{ // 2回連続で数字が押された
                        // もし「数字」が押されたら
                        if (isset($_POST ["number"])) {

                            // 1つ目の後者の数字がセットされたら
                            if (isset($_POST ["second"])){

                                // 1回目にセットした数字＋2回目にセットした数字を合わせる
                                $set = $_POST ["second"] . $_POST ["number"] ;

                                // 1の後に1を押したら11になる、それをセットする
                                echo "<input type='text' value='$set' name='second'>";
                            } else {
                                // 後者の数字をセットする
                                echo "<input type='text' value=".$_POST["number"]." name='second'>";
                            }
                        }else{
                            echo "<input type='text' value='0' name='set'>";
                        }
                    }
            
                }
            ?>
            <div class="screen">

            </div>
            <div class="line1">
                <input class="ac" type="submit" name="ac" value="AC"></input>
                <input class="plm" type="submit" name="plm" value="+/-"></input>
                <input class="per" type="submit" name="per" value="%"></input>
                <input class="div" type="submit" name="symbol" value="÷"></input>
            </div>
            <div class="line2">
                <input class="one" type="submit" name="number" value="1"></input>
                <input class="two" type="submit" name="number" value="2"></input>
                <input class="three" type="submit" name="number" value="3"></input>
                <input class="mul" type="submit" name="symbol" value="×"></input>
            </div>
            <div class="line3">
                <input class="four" type="submit" name="number" value="4"></input>
                <input class="five" type="submit" name="number" value="5"></input>
                <input class="six" type="submit" name="number" value="6"></input>
                <input class="add" type="submit" name="symbol" value="+"></input>
            </div>
            <div class="line4">
                <input class="seven" type="submit" name="number" value="7"></input>
                <input class="eight" type="submit" name="number" value="8"></input>
                <input class="nine" type="submit" name="number" value="9"></input>
                <input class="sub" type="submit" name="symbol" value="-"></input>
            </div>
            <div class="line5">
                <input class="zero" type="submit" name="number" value="0"></input>
                <input class="dp" type="submit" name="symbol" value="."></input>
                <input class="equal" type="submit" name="result" value="="></input>
            </div>
        </form>
    </div>
</body>
</html>