<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/checksignsession.php';
?>
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글작성</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>
    <br><br><br>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/adminheader.php';?>
    <div class="container">
      <table class="table">
        <tbody>
          <form name="writeboard" method="post" action="savepost.php">
            <tr>
              <th>작성자</th>
              <td><input type="hidden" class="form-control" value="<?=$_SESSION['userID']?>"><?=$_SESSION['userID']?></td>
            </tr>
            <tr>
              <th>제목</th>
              <td><input type="text" name="title" class="form-control" placeholder="제목을 입력하세요."></td>
            </tr>
            <tr>
              <th>내용</th>
              <td><textarea style="resize:none;" class="form-control" name="content" cols="80" rows="20"></textarea></td>
            </tr>
            <tr>
              <th>
                <input class="btn btn-primary" type="submit" value="등록" class="pull-right">
              </th>
              <td align="right">
                <button class="btn btn-primary pull-right" type="button" onclick="location.href='mainboard.php'">취소</button>
              </td>
            </tr>
          </form>
        </tbody>
      </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
