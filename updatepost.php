<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/connection.php';
?>
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글 수정</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>
    <?php
      include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/adminheader.php';
      echo "<br><br><br>";
      $id = $_GET['userID'];
      $boardID = $_GET['boardID'];

      $sql = "SELECT b.title, b.content, m.userID, b.regTime, b.boardID FROM board b ";
      $sql .= "JOIN mymember m ON (b.memberID = m.memberID) ";
      $sql .= "WHERE b.boardID = '{$boardID}'";

      $result = $dbConnect->query($sql);
      $rows = $result->fetch_array(MYSQLI_ASSOC);

      $title = $rows['title'];
      $content = $rows['content'];

      if(!isset($_SESSION['userID'])){
        echo '<script>alert("권한이 없습니다."); history.back(-2);</script>';
        exit;
      }else if($_SESSION['userID'] == $rows['userID']){
      ?>
      <div class="container">
        <table class="table" width="200px">
          <tbody>
          <form method="get" action="updateprocess.php">
            <tr>
              <th>작성자</th>
              <td><input type="hidden" name="id" value="<?=$_SESSION['userID']?>"><?=$_SESSION['userID']?></td>
            </tr>
            <tr>
              <th>제목</th>
              <td><input type="text" name="title" value="<?=$title?>"></td>
            </tr>
            <tr>
              <th>내용</th>
              <td><textarea name="content" style="resize:none;" cols="80" rows="20"><?=$content?></textarea></td>
            </tr>
            <tr>
              <th>
                <input type="hidden" name="boardID" value="<?=$boardID?>">
                <input type="submit" class="btn btn-primary" value="수정">
              </th>
          </form>
          <td align="right">
            <button type="button" class="btn btn-primary" onclick="location.href='mainboard.php'">이전</button>
          </td>
      </tr>
    <?php
      } else {
        echo '<script>alert("권한이 없습니다."); history.back(-2);</script>';
        exit;
        }
    ?>
  </body>
</html>
