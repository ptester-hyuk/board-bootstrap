<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/checksignsession.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/connection.php';
?>
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    .th-1 {
      width:200px;
    }
    .th-2 {
      width:550px;
    }
    .th-3 {
      width:200px;
    }
  </style>
  </head>
  <body>
      <br><br><br>
      <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/header.php';
      ?>
    <div class="container">
      <table class="table table-hover">
        <br><h2>자유게시판</h2><br>
        <thead>
          <th class="th-1">번호</th>
          <th class="th-2">제목</th>
          <th class="th-3">작성자</th>
          <th>게시일</th>
        </thead>
        <tbody>
          <tr>
          <?php
            if(isset($_GET['page'])){
              $page = (int) $_GET['page'];
            } else {
              $page = 1;
            }

            $numview = 20;

            $firstLimitValue = ($numview * $page) - $numview;

            $sql = "SELECT b.boardID, b.title, m.userID, b.regTime FROM board b ";
            $sql .= "JOIN mymember m ON (b.memberID = m.memberID) ORDER BY boardID ";
            $sql .= "DESC LIMIT $firstLimitValue, $numview";
            $result = $dbConnect->query($sql);

            if($result){
              $dataCount = $result->num_rows;

              if($dataCount > 0){
                for($i = 0; $i < $dataCount; $i++){
                  $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                  echo "<tr>";
                  echo "<td>".$memberInfo['boardID']."</td>";
                  echo "<td><a href='/MyBoard/viewpost.php?boardID=";
                  echo "{$memberInfo['boardID']}'>";
                  echo $memberInfo['title'];
                  echo "</a></td>";
                  echo "<td>{$memberInfo['userID']}</td>";
                  echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
              }
            }
            ?>
          </tr>
          </tbody>
        </table>
        <button type="button" class="btn btn-primary pull-left" id="writebutton" onclick="location.href='writepost.php'" >글쓰기</button>
    </div>
    <div class="container" style="text-align:center">
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/nextPageLink.php';
    include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/searchPost.php';
    ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
