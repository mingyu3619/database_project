<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="charset=utf-8">
    <title>article_page</title>
<link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form method=get action='search_page.php'>

  			<select name="category">
        <option value="press">언론사
        <option value="author">기자
        <option value="date">날짜
        <option value="sentiment">감성분석 값
        <option value="title">제목
  			<option value="paragraph">본문

  			</select>

  			<input type=text size=45 name=search required="required">
  			<button>찾기</button>
  		</form>

    <table width=800 border="1" cellpadding=10>

  <?
  $connect=mysql_connect("localhost","root","apmsetup");
  mysql_select_db("project_db",$connect);
  if($connect){}
  else{echo"접속실패";}


  $sql="select * from table_write";
  $result=mysql_query($sql,$connect);
  $fields=mysql_num_fields($result);
  $num=1;
  echo"<tr bgcolor=skyblue><td>no</td><td>언론사</td><td>기자</td><td>날짜</td><td>감성 수치</td><td>제목</td><td>본문</td></tr>";
  while($row=mysql_fetch_array($result)){
    echo"<tr><td>$num</td>";
    echo "<td align='center'>$row[press]</td>";
    echo "<td align='center'>$row[author]</td>";
    echo "<td align='center'>$row[date]</td>";
    echo "<td align='center'>$row[sentiment]</td>";
    echo "<td align='center'>$row[title]</td>";
    echo "<td align='center'><div><p><a href='view.php?sentiment=$row[sentiment]'>$row[paragraph]</a></p></div></td>";
    $num=$num+1;
    echo"</tr>";
  }
mysql_close($connect);
?>
</table>
  </body>
</html>
