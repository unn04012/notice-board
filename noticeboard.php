<?php
include("../login/connect.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  body{
    margin : 0;
    padding : 0;
  }
  .noticeboard_form{
    position : absolute;
    top : 50%;
    left : 50%;
    transform : translate(-50%, -50%);
  }
  .noticeboard_form h1{
    text-align : center;
  }
  table{
    border : 2px solid black;
    border-collapse : collapse;
    text-align : center;
  }
  table tr{
    border : 1px solid gray;
  }
  .td_center{
    text-align : center;
  }
  #title{
    width : 300px;
  }
  #date{
    width : 200px;
  }
  #number{
    width : 50px;
  }
  #see_count{
    width : 75px;
  }
  #write{
    text-align : right;
    padding : 0 15px;
  }
  .paging{
    text-align : center;
  }
  </style>
  <body>
    <?php
    $mb_id = $_SESSION['ss_mb_id'];
    $list = array();

    $data = "SELECT mb_no FROM notice ORDER BY mb_no desc";
    $reuslt_set = mysqli_query($conn, $data);
    $num = mysqli_num_rows($reuslt_set);    // 총 데이터의 수

    $list_page = 3; // 한 페이지에 보여질 데이터의 수
    $block = 3; // 한 블록당 보여질 리스트 수 ex) 1~3, 4~6,...
    $page = ($_GET['page'])?$_GET['page']:1;

    $pageNum = ceil($num/$list_page); // 총 페이지
    $blockNum = ceil($pageNum/$block); // 총 블록
    $nowBlock = ceil($page/$block); // 현재 페이지가 위치한 블록 번호(1,2,3...)
    $s_page = ($nowBlock * $block) - ($block - 1);
    if($s_page <=1){
      $s_page = 1;
    }

    $e_page  = $nowBlock*$block;
    if($pageNum <= $e_page){
      $e_page = $pageNum;
    }




    $s_point = ($page-1) * $list_page;
    $sql = "SELECT * FROM notice ORDER BY mb_no desc LIMIT $s_point,$list_page";
    $result = mysqli_query($conn, $sql);
    for($i = 0; $row=mysqli_fetch_assoc($result); $i++){
      $list[$i] = $row;
      if($row == false){
        break;
      }
    }
    $list_date  = array();
    $sql = "SELECT date_format(mb_post_datetime,'%Y-%m-%d')FROM notice";
    $result = mysqli_query($conn, $sql);
    for($i = 0; $row=mysqli_fetch_assoc($result); $i++){
      $list_date[$i] = $row;
      echo $list_date[$i]["date_format(mb_post_datetime,'%Y-%m-%d'"].'</br>';
    }
     ?>
    <div class="noticeboard_form">
      <h1>게시판</h1>
      <table>
        <thead>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>작성일</th>
            <th>조회수</th>
          </tr>
        </thead>
        <tbody>
          <?php
            for($i=0; $i<count($list); $i++){
           ?>
          <tr>
            <td id = "number" class = "notice"><?php echo $list[$i]['mb_no'] ?></td>
            <td id = "title" class = "notice"><a href="./board.php?number=<?php echo $list[$i]['mb_no'] ?>"><?php echo $list[$i]['mb_title'] ?></a> </td>
            <td class = "notice"><?php echo $list[$i]['mb_id'] ?></td>
            <td id = "date" class = "notice"><?php echo date("Y-m-d", strtotime($list[$i]['mb_post_datetime'])) ?></td>
            <td id = "see_count" class = "notice"><?php echo $list[$i]['mb_look_number'] ?></td>
          </tr>
        </tbody>
      <?php } ?>
      </table>
      <div id="write">
        <a href="./writeboard.php">글쓰기</a>
      </div>
      <div class="paging">
        <a href="<?php $PHP_SELF ?>?page=<?php echo  $s_page-1 ?>">이전</a>
        <?php for($p = $s_page; $p<=$e_page; $p++){?>
          <a href="<?php $PHP_SELF ?>?page=<?php echo $p ?>"><?php echo $p; ?></a>
        <?php } ?>
        <a href="<?php $PHP_SELF ?>?page=<?php echo  $e_page+1 ?>">다음</a>
      </div>
    </div>
  </body>
</html>
