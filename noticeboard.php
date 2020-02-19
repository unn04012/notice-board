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
  </style>
  <body>
    <?php
    $mb_id = $_SESSION['ss_mb_id'];
    $list = array();

    $sql = "SELECT * FROM notice ORDER BY mb_no desc ";
    $result = mysqli_query($conn, $sql);
    for($i = 0; $row=mysqli_fetch_assoc($result); $i++){
      $list[$i] = $row;
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
            <td id = "date" class = "notice"><?php echo $list[$i]['mb_post_datetime'] ?></td>
            <td id = "see_count" class = "notice"><?php echo $list[$i]['mb_look_number'] ?></td>
          </tr>
        </tbody>
      <?php } ?>
      <tfoot>
        <tr>
          <td colspan = "5" id = "write"><a href="./writeboard.php">글쓰기</a> </td>
        </tr>
      </tfoot>
      </table>
    </div>
  </body>
</html>
