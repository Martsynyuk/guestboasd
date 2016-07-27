<form name="autorization" action="login" method="POST">
	<span>login</span><input placeholder="input name or email" type="text" name="login" size="15">
	
	<?= (!empty($errors) && is_string($errors)) ? $errors : '' ; ?>
	<?php if(!empty($errors) && key_exists('username', $errors)) {
			echo implode(', ', $errors['username']);
		} elseif(!empty($errors) && key_exists('email', $errors)) {
			echo implode(', ', $errors['email']);
		}
	?>
	
	<span>password</span><input placeholder="input password" type="password" name="password" size="15">
	
	<?= (!empty($errors) && key_exists('password', $errors)) ? implode(', ', $errors['password']) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">
</form>
<a href="/user/register">registration