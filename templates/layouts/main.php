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

<script type="text/javascript" data-main="/webroot/js/config.js" src="/webroot/js/require.js"></script>

</head>
<body>
	<div id="script" data-script="<?= (isset($script)) ? $script : 'main' ; ?>"></div>
	
	<?= (User::isLoggetIn()) ? '<a class="btn btn-inverse" href="/user/logout">logout</a>' : ''?>
	<?= $content ?>
</body>
<script>
	requirejs([document.getElementById('script').getAttribute('data-script')], function () {});
</script>