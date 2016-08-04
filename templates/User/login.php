<form name="autorization" action="login" method="POST">
	<label>login<input placeholder="input name or email" type="text" name="login" size="15"></label>
	
	<?= (isset($error['login'])) ? Helper::showErrors('login', $error) : '' ; ?>
	
	<label>password<input placeholder="input password" type="password" name="password" size="15"></label>
	
	<?= (isset($error['password'])) ? Helper::showErrors('password', $error) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">
</form>
<a href="/user/register">registration