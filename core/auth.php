<?php


if(isset($_POST["login"]) && isset($_POST["password"])){
    $login = htmlspecialchars($_POST["login"]);
    $pass = htmlspecialchars($_POST["password"]);
    
    $admin = $con->createComand("SELECT * FROM `admin` WHERE login = :login",[':login' => $login])->findOne();

    //Вход
    if (isset($_POST["comeIn"])){   
        //var_dump($_POST); 
        //$user = $con->createComand("SELECT * FROM `user` WHERE login = :login",[':login' => $login])->findOne();
        if(!$admin){
            $_SESSION["error"] = "пользователя с логином $login не существует";
        } else if(password_verify($pass, $admin->password)){
            $_SESSION["isAuth"] = $admin;//Вошёл
            unset($_SESSION["error"]);
        } else {
            $_SESSION["error"] = "Не верный пароль";
        }
        unset($_POST["comeIn"]);
    }

    //Регистрация
    if (isset($_POST["register"])){
        //$user = $con->createComand("SELECT * FROM `user` WHERE login = :login",[':login' => $login])->findOne();
        if($user){
            $_SESSION["error"] = "Логин $login уже занят";
        } else {
            $num = number_hash($num, PASSWORD_BCRYPT);
            $user = $con->createComand("INSERT INTO `user`(`login`, `number`) VALUES (:login, :number)",[':login' => $login,'number'=> $num]);
            unset($_SESSION["error"]);
            $user = $con->createComand("SELECT * FROM `user` WHERE login = :login",[':login' => $login])->findOne();
            $_SESSION["isAuth"] = $user;//Вошёл
        }
        unset($_POST["register"]);
    }
    unset($_POST["login"]);
    unset($_POST["password"]);
}

//Выход
if(isset($_POST["logout"])){
    unset($_SESSION["isAuth"]);
}