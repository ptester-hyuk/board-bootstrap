<?php
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/session.php';
  include $_SERVER['DOCUMENT_ROOT'].'/MyBoard/connection.php';

  $userID = $_GET['userID'];
  $memberID = $_GET['memberID'];

  $sql = "SELECT memberID, userID FROM mymember ";
  $sql .= "WHERE memberID = '{$memberID}'";

  $result = $dbConnect->query($sql);
  $rows = $result->fetch_array(MYSQLI_ASSOC);

  if(!isset($_SESSION['userID'])){
    echo '<script>alert("권한이 없습니다."); history.back(-2);</script>';
    exit;
  }else if($_SESSION['userID'] == 'admin'){
      $sql = "DELETE FROM mymember WHERE memberID = '{$memberID}'";
      $delete = $dbConnect->query($sql);
      if($delete){
        echo '<script>alert("삭제 완료."); location.href="./admin.php";</script>';
      } else{
        echo '<script>alert("삭제 실패."); history.back(-2);</script>';
      }
  }else {
    echo '<script>alert("권한이 없습니다."); history.back(-2);</script>';
    exit;
  }
?>
