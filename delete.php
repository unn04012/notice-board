<?php
include("../login/connect.php");

$reslt = $_POST['check_list'];
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check_list']) ){
  $flag = false;
  foreach($_POST['check_list'] as $item){
    $sql = "DELETE FROM notice WHERE mb_no = '$item'";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      die("ERROR : ".mysql_error());
    }else{
      $flag = true;
    }

    if($flag == true){
      echo "<script> alert('삭제 되었습니다'); </script>;";
      echo "<script> location.replace('./noticeboard.php'); </script>;";
    }
  }
}
 ?>
