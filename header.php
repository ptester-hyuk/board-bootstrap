<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a href="mainboard.php"><h3 class="navbar-brand js-scroll-trigger">HYUK's WEB 게시판</h3></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <h4 class="btn btn-default" style="color:white"><?php echo "반갑습니다. {$_SESSION['userID']}님"?></h4>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-success" onclick="location.href='logout.php'">로그아웃</button>
          </li>
        </li>
        &nbsp;
        <li class="nav-item">
          <?php
            if($_SESSION['userID'] == 'admin'){
          ?>
          <button type="button" class="btn btn-success" onclick="location.href='admin.php'">관리자 페이지</button>
          <?php }?>
        </li>
        </ul>
      </div>
    </div>
  </nav>
