<?php
    $userName = $_POST["userName"];
    $userNameCn = $_POST["userNameCn"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $connect = require_once("db_setting.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // prepared statement
        $sql = "SELECT * FROM user WHERE user_name = ?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($res) == 1){
            echo "<script>alert('帳號已存在')</script>";
            header("Location: signup.html");
        }
        else{
            $sql = "INSERT INTO user (user_name, user_name_cn, password) VALUES ('$userName', '$userNameCn', '$password')";
            $res = mysqli_query($connect, $sql);
            if($res){
                echo "<script>alert('註冊成功')</script>";
                header("Location: login.html");
            }
            else{
                echo "<script>alert('註冊失敗')</script>";
                header("Location: signup.html");
            }
        }
    }
?>