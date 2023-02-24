<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$to="naddumohammad10@gmail.com";
$subject="test mail";
$message="this is test mail only";
$headers="From:amreenb653@gmail.com";
if(mail($to,$subject,$message,$headers))
echo'<h1>Email sent successfully</h1>';
else
echo"failed";


?>
</body>
</html>