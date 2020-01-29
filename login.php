<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    .container {
      position: relative;
      top: 150px;
    }
    </style>
  </head>
  <body>
    <form method="post" name="loginprocess" action="loginprocess.php">
      <div class="container" style="text-align:center">
        <h1>Member Login</h1>
        <br><br>
        <input type="text" name="loginID" placeholder="아이디" style="width:300px;height:35px;font-size:15px;border-radius:5px;background-color:#F5F5F5;">
        <br>
        <br>
        <input type="password" name="loginPW" placeholder="비밀번호" style="width:300px;height:35px;font-size:15px;border-radius:5px;background-color:#F5F5F5;">
        <br>
        <br>
        <input class="btn btn-dark" type="submit" value="로그인" style="width:300px;height:35px;border-radius:5px;">
      </div>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  </body>
</html>
