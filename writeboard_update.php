<?php
include("../login/connect.php");

$mb_id = $_SESSION['ss_mb_id'];

if(!$mb_id){
  echo "<script> alert('로그인 후 이용 가능합니다'); </script>";
  echo "<script> location.replace('../login/login.php'); </script>";
}

$mb_post_datetime = date('Y-m-d H:i:s', time());
$mb_title   = trim($_POST['title']);
$mb_content = trim($_POST['content']);

if(!$mb_title || !$mb_content){
  echo "<script> alert('제목과 내용을 입력해주세요'); </script>";
  echo "<script> location.replace('./writeboard.php'); </script>";
  exit;
}
if($mb_content)
$sql = "INSERT INTO notice
                SET mb_id = '$mb_id',
                    mb_post_datetime = '$mb_post_datetime',
                    mb_title = '$mb_title',
                    mb_content = '$mb_content',
                    mb_look_number = '0'";
$result = mysqli_query($conn, $sql);


if($result){
  echo "<script> alert('성공적으로 업로드 되었습니다'); </script>";
  echo "<script> location.replace('./noticeboard.php');</script>";
  exit;
}else{
  echo "<script> alert('업로드실패'); </script>";
  echo "<script> location.replace('./writeboard.php');</script>";
  exit;
}
 ?>
