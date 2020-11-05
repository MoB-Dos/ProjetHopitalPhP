
<!DOCTYPE html>
<html>
<head>

</head>

<body>

<?php



$p = intval($_POST['test']);



$con = mysqli_connect('localhost','root','','hopitalphp');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}



mysqli_select_db($con,"ajax_demo");
$sql="DELETE FROM tableau WHERE id = '".$p."'";
$result = mysqli_query($con,$sql);

mysqli_close($con);



?>
</body>
</html> 