<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<title>guestboard</title>
<link rel="stylesheet" type="text/css" href="/webroot/css/main.css">
</head>
<body>
	<?= (User::isLogin()) ? '<a href="/user/logout">logout' : ''?>
	<?= $content ?>
</body>