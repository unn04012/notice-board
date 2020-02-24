<?php
include("../login/connect.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    .noticeboard_form{
      text-align  : center;
    }
    table{
      border : 2px solid black;
      border-collapse : collapse;
    }
    table tr{
      border : 1px solid gray;
    }
    .title{
      width : 50%;

    }
    th{
      padding : 0 5px;
    }
    td{
      border-right : 1px solid black;
      text-align : left;
      padding : 5px  20px;
    }
    #file{
      text-align  : left;
    }
    </style>
  </head>
  <body>
    <div class="noticeboard_form">
      <h1>글쓰기</h1>
      <form class="" action="writeboard_update.php" method="post" enctype = "multipart/form-data">
        <table>
          <tr>
            <th>제목</th>
            <td><input type="text" name="title" value="" class = "title"> </td>
          </tr>
          <tr>
            <th>내용</td>
            <td><textarea name="content" rows="8" cols="80"></textarea> </td>
          </tr>
          <tr>
            <th>파일</th>
            <td colspan = "2" id = "file"><input type="file" name="myfile" value="파일선택 "></td>
          </tr>
        </table>
        <input type="submit" name="" value="올리기">
      </form>
    </div>
  </body>
</html>
