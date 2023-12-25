<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <?php
      session_start();
      if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
        echo "<a class='navbar-brand' href='logout.php'>登出</a>";
      }
      else
        echo"
              <div>
                <a class='navbar-brand' href='login.html'>登入</a>
                <a class='navbar-brand' href='signup.html'>註冊</a>
              </div>
            ";
    ?>
  </div>
</nav>
</body>
</html>