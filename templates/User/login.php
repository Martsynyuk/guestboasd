<form name="autorization" action="login" method="POST">
	<label>login<input placeholder="input name or email" type="text" name="login" size="15"></label>
	
	<?= (!empty($error)) ? Model::validHelper('login', $error) : '' ; ?>
	
	<label>password<input placeholder="input password" type="password" name="password" size="15"></label>
	
	<?= (!empty($error)) ? Model::validHelper('password', $error) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">
</form>
<a href="/user/register">registration