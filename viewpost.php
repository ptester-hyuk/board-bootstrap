<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/checksignsession.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/connection.php';
?>
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <style>
    .c1 { background-color: #DDDDDD;}
    .c2{ height: 500px;}
  </style>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/adminheader.php';?>
    <br><br><br><br>
<div class="container">
<table class="table">
  <colgroup>
    <col width="20%"/>
    <col width="55%"/>
    <col width="20%"/>
    <col width="55%"/>
    <col width="20%"/>
  </colgroup>
  <tbody>
      <?php
      if(isset($_GET['boardID']) && (int) $_GET['boardID'] > 0){
        $boardID = $_GET['boardID'];
        $sql = "SELECT b.title, b.content, m.userID, b.regTime, b.boardID FROM board b ";
        $sql .= "JOIN mymember m ON (b.memberID = m.memberID) ";
        $sql .= "WHERE b.boardID = {$boardID}";
        $result = $dbConnect->query($sql);

        if($result){
          $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
          echo "<tr>";
          echo "<th class='c1' scope='row'>제목</th>";
          echo "<td>".$contentInfo['title']."</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<th class='c1' scope='row'>작성자</th>";
          echo "<td>".$contentInfo['userID']."</td>";
          echo "</tr>";
          $regDate = date("Y-m-d h:i");
          echo "<tr>";
          echo "<th class='c1' scope='row'>게시일</th>";
          echo "<td>"."{$regDate}"."</td>";
          echo "</tr>";
          echo "<tr>";
          //echo "<th scope='row'>내용</th>";
          echo "<td colspan='2' class='c2'>".$contentInfo['content']."</td>";
          echo "</tr>";
          ?>
          <tr>
            <th>
              <button type="button" class="btn btn-primary" onclick="location.href='mainboard.php'">목록</button>
            </th>
            <td align="right">
              <form method="get" action="updatepost.php">
                <input type="hidden" name="userID" value="<?=$contentInfo['userID']?>">
                <input type="hidden" name="boardID" value="<?=$contentInfo['boardID']?>">
                <input type="submit" value="수정" class="btn btn-primary">
              </form>
            </td>
            <td>
              <form method="get" action="deletepost.php">
                <input type="hidden" name="userID" value="<?=$contentInfo['userID']?>">
                <input type="hidden" name="boardID" value="<?=$contentInfo['boardID']?>">
                <input type="submit" value="삭제" class="btn btn-primary">
              </form>
            </td>
          </tr>
        </tbody>
      </table>
  </div>
    <?php
      } else{
        echo '<script>alert("잘못된 접근입니다."); history.back(-2);</script>';
        exit;
      }
    }else {
      echo '<script>alert("잘못된 접근입니다."); history.back(-2);</script>';
      exit;
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
