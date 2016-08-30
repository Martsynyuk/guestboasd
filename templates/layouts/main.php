<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<title>guestboard</title>
<link rel="stylesheet" type="text/css" href="/webroot/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/webroot/css/main.css">
	
<script>
	var require = {
		baseUrl: '/webroot/js',
		paths: {
			googleMaps: 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgnsp7HMAHLR_ntjubgpnt3A8evQvsgg'
		}
	}
</script>


</head>
<body>
	<?= (User::isLoggetIn()) ? '<a class="btn btn-inverse" href="/user/logout">logout</a>' : ''?>
	<?= $content ?>
</body>
