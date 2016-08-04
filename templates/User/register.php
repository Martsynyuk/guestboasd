<form name="autorization" action="register" method="POST">
	<label>username<input placeholder="input name" type="text" name="username" size="15"></label>
	
	<?= (!empty($error)) ? Helper::showErrors('username', $error) : '' ; ?>
	
	<label>email<input placeholder="input email" type="mail" name="email" size="15"></label>
	
	<?= (!empty($error)) ? Helper::showErrors('email', $error) : '' ; ?>
	
	<label>password<input placeholder="input password" type="password" name="password" size="15"></label>
	
	<?= (!empty($error)) ? Helper::showErrors('password', $error) : '' ; ?>
	
	<label>confirm password<input placeholder="confirm password" type="password" name="confirmpassword" size="15"></label>
	
	<?= (!empty($error)) ? Helper::showErrors('confirmpassword', $error) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">
</form>
<a href="/user/login">login