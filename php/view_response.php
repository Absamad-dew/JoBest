<?php
session_start();
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
$id =  mysqli_real_escape_string($link,$_POST['id'] );
$login = $_SESSION['login'];
$test = "SELECT * FROM people WHERE Login = '$login'";
$points = $_SESSION['points'] - 1;
$result = mysqli_query($link, "SELECT * FROM response WHERE `login` = '$login'");
$test_result = mysqli_query($link, "SELECT * FROM people");
//    echo $_SESSION['points'],$_SESSION['password'],$_SESSION['login'],$_SESSION['points'];
$_SESSION['points'] = $points;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/grid.min.css">
    <link rel="stylesheet" href="../sass/index.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container row">
    </div>
    <div class="header">
        <div class="container">
            <div class="row header-row">
                <a href="../reg.php" class="col-lg-3 logo">
                    JoBest
</a>
                <div class="col-lg-3 header-categories">Здраствуйте <?php echo $_SESSION['login']  ?></div>
                <div class="col-lg-2 header-categories"> Баланс- <?php echo $_SESSION['points'] ?></div>
                <div href="#" class="col-lg-2 header-categories"><button onclick="replenish()">Пополнить</button>
                    <div id="balance" class="balance ">
                        <a href="php/10points.php" class="balance_price">
                            5 point
</a>
                        <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=10%20points&default-sum=10&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=http%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                        <button class="balance_price">
                            10 points
                        </button>
                        <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=10%20points&default-sum=10&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=http%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                        <button class="balance_price">
                            20 points
                        </button>
                        <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=10%20points&default-sum=10&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=http%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                    </div>
                </div>
                <a href="php/posts.php" class="col-lg-2 header-categories header-button">Добавить вакансию</a>
            </div>
        </div>
    </div>
    <main>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="main-search align-middle col-lg-12">
                    <div class="row align-middle">
                        <div class="col-lg-2  flex">
                            <div class="main-icon">
                                <div class="main-icon-search"> </div>
                            </div>
                            <input type="text" value="Поиск работы" class="main-input">
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 main-search-text">в Москве</div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-1">
                            <div class="main-search-hr "></div>
                        </div>
                        <div class="col-lg-3 flex">
                            <div class="main-icon">
                                <div class="main-icon-people"> </div>
                            </div>
                            <div class="main-search-text ">Создать резюме</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- start row -->
            <div class="row text-align-center ">
                <div class="col-lg-5 main-row-title">
                    Вакансии в Москве
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-2 main-row-subtitle-one">Два вас</div>
                <div class="col-lg-2 main-row-subtitle-two">Рядом</div>
                <div class="col-lg-2 main-row-subtitle-two">Новые</div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12 main-row-hr">
                    <div class="pink"></div>
                </div>
            </div>

        </div>
        <!-- main-container -->
        <div class="main-container container">
            <div class="row">
                <div class="col-lg-9">
                    <?php
                    if ($result) {
                        $rows = mysqli_num_rows($result);
                        for ($i = 0; $i < $rows; ++$i) {
                            $row = mysqli_fetch_row($result);
                            echo "<form class=\"main-grey-vacancy\">
                            <div class=\"main-vacancy-title\">От  $row[3]</div>
                               <div class=\"main-vacancy-description\">$row[1]</div>
                               <div class=\"main-vacancy-subtitle\">Email $row[2]</div>
                               

                               <div class=\"main-vacancy-description\">$row[4]</div>
                               <!-- row -->
                               <div class=\"main-vacancy-location-title\">$row[7]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[8]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[12]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[13]</div>
                               <input type=\"text\" placeholder=\"Введите свое собщение\" class=\"main-vacancy-actions_input\" name=\"message\">
                               <div class=\"main-vacancy-actions\">
                               <div class=\"row\">
                                   <a href=\"../reg.php\" class=\"col-lg-4 main-vacancy-actions-item\">Ответить</a>
                               </div>
                           </div>
                           </form>";
                        }
                    }
                    ?>

                </div>
                <!-- sidebar -->
                <!-- <div class="col-lg-1"></div> -->

            </div>
        </div>
    </main>
    <!-- Пополнение баланса  -->


</body>
<script src="js/index.js"></script>

</html>