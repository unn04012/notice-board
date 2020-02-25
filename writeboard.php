<?php
include("../login/connect.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./noticeboard.css">
  </head>
  <body>
    <div class="writeboard_form">
      <h1>글쓰기</h1>
      <form class="" action="writeboard_update.php" method="post" enctype = "multipart/form-data">
        <table>
          <tr>
            <th class = "center">제목</th>
            <td><input type="text" name="title" value="" class = "title"> </td>
          </tr>
          <tr>
            <th class = "center">내용</td>
            <td><textarea name="content" rows="8" cols="80"></textarea> </td>
          </tr>
          <tr>
            <th class = "center">파일</th>
            <td colspan = "2" id = "file"><input type="file" name="myfile" value="파일선택 "></td>
          </tr>
        </table>
        <input type="submit" name="" value="올리기">
      </form>
    </div>
  </body>
</html>
