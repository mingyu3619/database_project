<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>search_page</title>
  </head>
  <body>
      <table width=800 border="1" cellpadding=10>
      <form class="" action="index.html" method="post">


<?
$category=$_GET['category'];
$search=$_GET['search'];
$sql2="select * from table_write where $category like '%{$search}%';";

$connect=mysql_connect("localhost","root","apmsetup");
if($connect){}
else{echo"접속실패";}
mysql_select_db("project_db",$connect);
$result2=mysql_query($sql2,$connect);
$fields2=mysql_num_fields($result2);
$total_rows=mysql_num_rows($result2);
echo"총 $total_rows 개의 결과";

  $num2=1;
echo"<tr bgcolor=skyblue><td>no</td><td>언론사</td><td>기자</td><td>날짜</td><td>감성 수치</td><td>제목</td><td>본문</td></tr>";

while($row=mysql_fetch_array($result2)){
  echo"<tr><td>$num2</td>";
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
</form>
</table>


  </body>
</html>
