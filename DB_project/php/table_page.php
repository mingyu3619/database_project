<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>table_page</title>
  </head>
  <body>
    <div style="width:49%;float:left;">
    <table width=400 border="1">
      <caption>1일단위 기사량</caption>
    <?
    $connect=mysql_connect("localhost","root","apmsetup");
    mysql_select_db("project_db",$connect);
    if($connect){}
    else{echo"접속실패";}
    $sql="select date,count(date) as cnt from table_write group by date";
    $result=mysql_query($sql,$connect);
    $fields=mysql_num_fields($result);
    $num=1;
    while($row=mysql_fetch_row($result)){

      echo"<tr height=5><td>$num</td>";
        for($i=0;$i<$fields;$i=$i+1){
          echo"<td><div><p>$row[$i]</p></div></td>";

        }
        $num=$num+1;
        echo"</tr>";
    }


    ?>
  </table>
</div>
<div style="width:49%;float:right;">
  <table width=400 border="1">
    <caption>언론사별 기사 수 </caption>
  <?

  $sql2="select press,count(press) as cnt from table_write group by press";
  $result=mysql_query($sql2,$connect);
  $fields=mysql_num_fields($result);
  $num=1;
  while($row=mysql_fetch_row($result)){

    echo"<tr height=5><td>$num</td>";
      for($i=0;$i<$fields;$i=$i+1){
        echo"<td><div><p>$row[$i]</p></div></td>";

      }
      $num=$num+1;
      echo"</tr>";
  }
mysql_close($connect);
?>
</table>
</div>
  </body>
</html>
