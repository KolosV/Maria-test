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
    <title>Admin</title>
</head>
<body>
    <div class="back1">>
        <div class="form1" id="form1">
            <div class="form_body">
                     <div class="form_blockk d-f">
                        <input type="text" required placeholder="Логин">
                        <input type="text" required placeholder="Пароль">                  
                        <button type="submit">
                           Отправить              
                        </button>                                  
                     </div>
               </div>      
            </div>
            <a href="index.php" class="btn btn-pink6">Домашняя</a>
            <a href="price.php" class="btn btn-pink7">Прайс лист</a>
         </div>
     </div>
</body>
</html>