<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/connection.php';

  $searchKeyword = $dbConnect->real_escape_string($_POST['searchKeyword']);
  $searchOption = $dbConnect->real_escape_string($_POST['option']);

  if($searchKeyword == '' || $searchKeyword == null){
    echo '<script>alert("검색어가 없습니다."); history.back(-2);</script>';
    exit;
  }

  switch($searchOption){
    case 'title':
    case 'content':
    case 'tandc':
    case 'torc':
      break;
    default:
      echo "검색 옵션이 없습니다.";
      exit;
      break;
  }

  $sql = "SELECT b.boardID, b.title, m.userID, b.regTime FROM board b ";
  $sql .= "JOIN mymember m ON (b.memberID = m.memberID)";

  switch($searchOption){
    case 'title':
      $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
      break;
    case 'content':
      $sql .= "WHERE b.content LIKE '%{$searchKeyword}%'";
      break;
    case 'tandc':
      $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
      $sql .= " AND ";
      $sql .= "b.content LIKE '%{$searchKeyword}%'";
      break;
    case 'torc':
      $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
      $sql .= " OR ";
      $sql .= "b.content LIKE '%{$searchKeyword}%'";
      break;
  }

  $result = $dbConnect->query($sql);

  if($result){
    $dataCount = $result->num_rows;
  } else{
    echo '<script>alert("오류 발생 - 관리자 문의"); history.back(-2);</script>';
  }

?>

<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>검색 결과</title>
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
    <?php include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/adminheader.php';?>
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
                echo "<tr><td colspan='4'>{$searchKeyword}를 포함하는 게시글이 없습니다..</td></tr>";
              }
            ?>
          </tr>
        </tbody>
      </table>
      <form method="post" action="mainboard.php">
        <input type="submit" class="btn btn-primary" value="이전">
      </form>
    </div>
  </body>
</html>
