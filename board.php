<?php
include("../login/connect.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .board_form{
        position : absolute;
        top : 50%;
        left : 50%;
        transform : translate(-50%, -50%);

        border : 2px solid black;
        text-align : center;
        padding : 20px;
      }
      .title h1{
        border-bottom : 1px solid gray;
      }
      .content h2{
        border-bottom : 1px solid gray;
      }
    </style>
  </head>
  <body>
    <?php
    $number = $_GET['number'];
    $sql = "SELECT * FROM notice WHERE mb_no = $number";
    $sql_increase_look = "UPDATE notice SET mb_look_number = mb_look_number+1 WHERE mb_no = $number";
    $sql_image = "SELECT * FROM upload_file WHERE file_no = $number";


    $result_image = mysqli_query($conn, $sql_image);
    if($result_image){
      $list_image = mysqli_fetch_assoc($result_image);
    }else{
      $list_image['file_path'] = "";
    }

    mysqli_query($conn, $sql_increase_look);
    $result = mysqli_query($conn, $sql);
    $list = mysqli_fetch_assoc($result);
     ?>
    <div class="board_form">
        <div class="title">
          <h1>제목</h1>
          <?php echo $list['mb_title'] ?>
        </div>
        <div class="content">
          <h2>내용</h2>
          <p><?php echo $list['mb_content']?></p>
          <img src="<?php echo $list_image['file_path'] ?>" alt="" width ="500">
        </div>
    </div>
  </body>
</html>
