<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WEB 게시판 </title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    .container {
      position: relative;
      top: 150px;
    }
    </style>
  </head>
  <body>
    <div class="container" style="text-align:center">
      <img src="img/icons-shutdown.jpg" alt="shutdownImage">
      <br><br>
      <h1>HYUK's WEB 게시판</h1>
      <br><br><br><br>
      <button style="min-width:33%;width:250px;" type="button" class="btn btn-dark" onclick="location.href='login.php'">로그인</button>
      <br>
      <br>
      <button style="min-width:33%;width:250px;" type="button" class="btn btn-secondary" onclick="location.href='signup.php'">회원가입</button>
    </div>
    <button class="btn btn-light"></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
