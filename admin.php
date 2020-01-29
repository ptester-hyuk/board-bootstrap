<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/checksignsession.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/connection.php';
?>
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>관리자 페이지</title>
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
    <?php include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/adminheader.php';?>
  <div class="container">
    <table class="table table-hover">
      <br><br><br><br><h2>사용자 목록</h2><br>
      <thead>
        <th class="th-1">번호</th>
        <th class="th-2">사용자</th>
        <th class="th-3">가입 시기</th>
        <th></th>
      </thead>
      <tbody>
        <tr>
            <?php
              $sql = "SELECT memberID, userID, regTime FROM mymember ";
              $result = $dbConnect->query($sql);

              if($result){
                $dataCount = $result->num_rows;

                if($dataCount > 0){
                  for($i = 0; $i < $dataCount; $i++){
                    $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                    echo "<tr>";
                    echo "<td>".$memberInfo['memberID']."</td>";
                    echo "<td>{$memberInfo['userID']}</td>";
                    echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
                    echo "<td>";
                    if($memberInfo['userID'] != 'admin'){
                    ?>
                    <div class="container" style="text-align:center">
                      <form method="post" name="delIDprocess" action="deleteID.php">
                        <input type="hidden" name="userID" value="$memberInfo['memberID']">
                        <input type="hidden" name="memberID" value="$memberInfo['userID']">
                        <input class="btn btn-primary btn-sm" type="submit" value="삭제">
                      </form>
                    </div>
                    <?php
                  }
                    echo "</td>";
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
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
  </body>
</html>
