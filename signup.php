<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    .container {
      position: relative;
      top: 150px;
    }
    </style>
  </head>
  <body>
    <form method="post" action="signupsave.php">
      <div class="container" style="text-align:center">
      <h1>Sign In</h1>
      <br><br>
      <input type="text" name="yourID" placeholder="아이디" style="width:300px;height:35px;font-size:15px;border-radius:5px;background-color:#F5F5F5;">
      <br><br>
      <input type="password" name="yourPW" placeholder="비밀번호" style="width:300px;height:35px;font-size:15px;border-radius:5px;background-color:#F5F5F5;">
      <br><br>
      <input type="text" name="yourEmail" placeholder="이메일" style="width:300px;height:35px;font-size:15px;border-radius:5px;background-color:#F5F5F5;">
      <br><br>
      <input type="text" name="yourName" placeholder="이름" style="width:300px;height:35px;font-size:15px;border-radius:5px;background-color:#F5F5F5;">
      <br><br>
      <input type="submit" class="btn btn-dark" value="가입하기" style="width:300px;height:35px;border-radius:5px;">
      </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
