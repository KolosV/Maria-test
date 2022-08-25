<?php
    session_start();

    use Core\Conn;
    
    spl_autoload_register();
    mb_internal_encoding("UTF-8");
    $startDir = __DIR__;
    $ds = DIRECTORY_SEPARATOR;
    $con = new Conn;
    include "core/auth.php";
    
    $sql ="INSERT INTO `user` (`login`,`phone`) VALUES (:name, :phone)";

    
    $uri = $_SERVER["REQUEST_URI"];
    $uri = preg_replace("/\/Maria/","",$uri); // костыль для Xampp

    preg_match_all("/((?<=\?)|(?<=\/)|(?<=\&))\w+/",$uri,$urlParam);
    $urlParam = $urlParam[0];
    $uri = $urlParam[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Prices</title>
</head>
<body>

        <div class="modal" id="modal">
           <div class="modal_body">
              <div class="modal_close d-f" id="close_btn" alt="close">
                 Закрыть
              </div>
              <div class="modal_content">
                 <h2> 
                    Позвоните мне
                 </h2>
                 <form action="/" method="get">  
                    
                    <div class="form_block d-f">

                       <input type="text" required placeholder="Ваше имя" name="login">
                       <input type="text" required placeholder="+7 ( _ _ _) _ _ - _ _ - _ _" name="phone">                  
                       <button type="submit">
                          Отправить              
                       </button>                  
                                        
                       </div>
                    </div>
                 </form>
              </div>      
           </div>
        </div>

    <div class="back1">
        <p class="tablet"> 
            <img src="img/Tablet-Frame-PNG.png" alt="tablet">
        </p>
        <ul class="site-menu">
            <li><a>ПРАЙС-ЛИСТ МАНИКЮР
                <p>Маникюр без покрытия</p>
                <p>Маникюр с покрытием лаком</p>
                <p>Маникюр с покрытием гель-лаком </p>
                <p> Мужской маникюр</p>
                <p> Доплата за маникюр в 4 руки</p>
                </a></li>
            <li><a>ПРАЙС-ЛИСТ РЕМОНТ И УКРЕПЛЕНИЕ НОГТЕЙ
                <p> Реставрация ногтей за 1 ноготь</p>
                <p> Укрепление IBX</p>
                <p>Укрепление акрилом</p>
                <p> Укрепление гелем</p>
                </a></li>
            <li><p>ПРАЙС-ЛИСТ УХОДЫ GREYMY PROFESSIONAL </p>
                <p>Ботокс для волос в момент окрашивания</p> 
                <p>Пилинг кожи головы </p>
                <p>Экспресс-уход «Моментальный блеск»</p>
                <p>Кератиновая экспресс-терапия для восстановления волос с комплексом аминокислот и экстрактом черной икры (средние/длинные)</p></li>
        </ul>
        <ul class="price">
            <li><a>ЦЕНА
                <p> 1 000 / 1 050 руб </p>
                <p> 1 400 / 1  500 руб </p>
                 <p> 1 700 / 1 900 руб</p>
                <p> 1 200 руб</p>
                <p> 250 руб</p>
                </a></li>
            <li><a> ЦЕНА
                <p>250 руб </p>
                <p>  - </p>
                <p> 700 руб </p>
                <p> 600 руб </p>
                <p> 1450 руб </p>
                </a></li>
            <li><p>ЦЕНА</p>
                <p>1 400 руб </p>
                <p> 1 690 руб </p>
                <p> 1 400 руб</p>
                <p> 4 250 / 4 750 руб</p></li>
        </ul>
        <a href="index.php" class="btn btn-pink1">Домашняя</a>
        <a href="admin.php" class="btn btn-pink2">Администратор</a>
        <?php if (!empty($_SESSION['auth'])): ?>
        <a href="#" class="btn btn-pink3 hidden">Создать</a>
        <a href="#" name="logout" value="check" class="btn btn-pink4 hidden">Выйти</a>
        <?php endif; ?>
        <a class="btn btn5"><img src="img/onlayn-zapis.png"></a>
       </div>
       <script src="modal.js"></script>
       <?php 
        
    ?>
    </main>
    <aside class="attention" <?= isset($_SESSION["error"]) ? 'style="visibility: visible;"':''; ?>>
        <p><?php if(isset($_SESSION["error"])) echo $_SESSION["error"]?></p>
    </aside>
</body>
</html>