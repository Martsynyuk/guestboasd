<form name="autorization" action="login" method="POST">
	<?php if(empty($errors)) { $errors = []; } ?>
	<?php User::form('login', $errors) ?>
</form>
<a href="/user/register">registration