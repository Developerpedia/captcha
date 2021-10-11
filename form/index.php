<?php
session_start();
error_reporting(0);
?>
<center>
<div id ="response" style= "font-size:45px;" style= "font-family:monospace;"></div>
</center>

<script type ="text/javascript">
setInterval(function()
{
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","response.php",false);
xmlhttp.send(null);
document.getElementById("response").innerHTML=xmlhttp.responseText;
},1000);
</script>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="container">
<h1>User Details</h1>
<form action="" method="POST">
    <label for="name">Name</label>
    <input type="text" name="username" placeholder="Enter Your Name....">

    <label for="Email">Email</label>
    <input type="text"  name="email" placeholder="Enter your Email id....">

    <label for="DOB">Date of Birth</label>
    <input type="Date"  name="date" placeholder="....">

    <label for="about">About Yourself</label>
    <textarea id="det"  name="about" placeholder="Tell us about yourslef...."></textarea>

    <label>Captcha:</label>
	<input type="text" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha">
	<img src="captcha.php"/>
    <br>
    <input type="submit" name="submit" value="Send your message">
  </form>
</div>
</body>
</html>
<?php
  $con=mysqli_connect('localhost','root','','form');
  if(isset($_POST['submit']))
  {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $about = $_POST['about'];
  $captcha = $_POST['captcha'];

  if($_SESSION['CODE']==$captcha)
  {
    mysqli_query($con,"insert into details(username,email,date,about) values('$username','$email','$date','$about')");  
    echo "<p style='padding-left:65ch; padding-top:2ch; font-family:monospace; font-size:140%; color:#04AA6D;'>". "Your Message has been sent!";
  }
    else
   {
       echo "<p style='padding-left:65ch; padding-top:2ch; font-family:monospace; font-size:140%; color:#ff6b6b;'>"."All Fields are required!";
   }

  } 
 ?>