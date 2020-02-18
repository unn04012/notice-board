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
    table{
      border : 2px solid black;
      border-collapse : collapse;
    }
    table tr{
      border : 1px solid gray;
    }
    </style>
  </head>
  <body>
    <div class="noticeboard_form">
      <form class="" action="write_check.php" method="post">
        <table>
          <tr>
            <th>제목</th>
            <td><input type="text" name="title" value=""> </td>
          </tr>
          <tr>
            <th>내용</td>
            <td><textarea name="content" rows="8" cols="80"></textarea> </td>
        </table>
        <input type="submit" name="" value="올리기">
      </form>
    </div>
  </body>
</html>
