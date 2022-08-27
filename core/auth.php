<?php


if(isset($_POST["login"]) && isset($_POST["password"])){
    $login = htmlspecialchars($_POST["login"]);
    $pass = htmlspecialchars($_POST["password"]);
    
    //Вход
    if (isset($_POST["comeIn"])){   
        //var_dump($_POST); 
        $user = $con->createComand("SELECT * FROM `admin` WHERE login = :login",[':login' => $login])->findOne();
        if(!$user){
            $_SESSION["error"] = "пользователя с логином $login не существует";
        } else if(password_verify($pass, $user->password)){
            $_SESSION["isAuth"] = $user;//Вошёл
            unset($_SESSION["error"]);
        } else {
            $_SESSION["error"] = "Не верный пароль";
        }
        unset($_POST["comeIn"]);
    }

    }
    unset($_POST["login"]);
    unset($_POST["password"]);


//Выход
if(isset($_POST["logout"])){
    unset($_SESSION["isAuth"]);
}