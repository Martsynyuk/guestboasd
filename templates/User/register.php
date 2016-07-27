<form name="autorization" action="register" method="POST">
	<span>username</span><input placeholder="input name" type="text" name="username" size="15">
	
	<?= (!empty($errors) && key_exists('username', $errors)) ? implode(', ', $errors['username']) : '' ; ?>
	
	<span>email</span><input placeholder="input email" type="mail" name="email" size="15">
	
	<?= (!empty($errors) && key_exists('email', $errors)) ? implode(', ', $errors['email']) : '' ; ?>
	
	<span>password</span><input placeholder="input password" type="password" name="password" size="15">
	
	<?= (!empty($errors) && key_exists('password', $errors)) ? implode(', ', $errors['password']) : '' ; ?>
	
	<span>confirm password</span><input placeholder="confirm password" type="password" name="confirmpassword" size="15">
	<input type="submit" name="submit" value="submit">
</form>
<a href="/user/login">login