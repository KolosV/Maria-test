<?php
    session_start();

    use Core\Conn;
    
    spl_autoload_register();
    mb_internal_encoding("UTF-8");
    $startDir = __DIR__;
    $ds = DIRECTORY_SEPARATOR;
    $con = new Conn;
    include "core/auth.php";
    
    $sql ="INSERT INTO `user` (`login`,`password`) VALUES (:name, :pass)";

    
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
    <title>Maria</title>
</head>
<body>
     <div class="back1">
        <p class="logo"> 
            <img src="img/Maria-designstyle-smoothie-m.png" alt="Maria">
        </p>
     <p class="saloon">
        Салон красоты
     </p>
     <p class="adress">
        Санкт-Петербург, 
        Индустриальный проспект,  40 к1, 
        Вход с Индустриального проспекта
        +7-812-364-54-45
     </p>
     <a href="price.php" class="btn btn-pink">Прайс лист</a>
    </div>
</body>
</html>