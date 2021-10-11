<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"form");
$res=mysqli_query($link, "select * from table1");
while($row=mysqli_fetch_array($res))
{
 $duration=$row["duration"];
}

$_SESSION["duration"]=$duration;
$_SESSION["start_time"]=date("y-m-d H:i:s");

$end_time=$end_time=date("y-m-d H:i:s", strtotime('+'.$_SESSION["duration"]."minutes",strtotime($_SESSION["start_time"])));

$_SESSION["end_time"]=$end_time;
?>
<script type = "text/javascript">
window.location="index.php";
</script>
