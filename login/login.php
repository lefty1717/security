<?php
    $connect = require_once("db_setting.php");
    $userName = $_POST["userName"];
    $password = $_POST["password"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM user WHERE user_name = '$userName'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1 && password_verify($password, $row["password"])){
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["userName"] = $row["user_name"];
            $_SESSION["userNameCn"] = $row["user_name_cn"];
            header("Location: index.php");
        }
        else{
            echo "<script>alert('帳號或密碼錯誤')</script>";
            header("Refresh: 2; url=login.html");
        }
    }

    mysqli_close($connect);
?>