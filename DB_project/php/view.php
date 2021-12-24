<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
    <title>view</title>
  </head>
</html>
<?
$SENTIMENT=$_GET['sentiment'];
$connect=mysql_connect("localhost","root","apmsetup");
mysql_select_db("project_db",$connect);
if($connect){}
else{echo"접속실패";}
$sql="select * from table_write where sentiment like '%{$SENTIMENT}%';";

$result=mysql_query($sql,$connect);
$row=mysql_fetch_array($result);
?>
<article id="bo_v">
        <header>
            <h1 id="bo_v_title">
                <?
                    echo $row['title'];
                ?>
            </h1>
        </header>
        <section id="bo_v_info">
            언론사:<strong><?echo $row['press'];?></strong>
            날짜:<strong><?echo $row['date'];?></strong>
            기자:<strong><?echo $row['author'];?></strong>
            감성분석:<strong><?echo $row['sentiment'];?></strong>
        </section>
        <br>
        <section id="bo_v_atc">
            <div id="bo_v_con"><?echo $row['paragraph'];?></div>
        </section>
    </article>
