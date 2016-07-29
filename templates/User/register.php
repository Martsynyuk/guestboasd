<form name="autorization" action="register" method="POST">
	<?php if(empty($errors)) { $errors = []; } ?>
	<?php User::form('register', $errors) ?>
</form>
<a href="/user/login">login