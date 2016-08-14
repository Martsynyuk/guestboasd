<div class="row">
	<div class="span4">
		<form name="autorization" action="login" method="POST">
		<div class="fields">
			<div class="field">
				<label>login<input placeholder="input name or email" type="text" name="login" size="15"></label>
					
				<?= (isset($error['login'])) ? Helper::showErrors('login', $error) : '' ; ?>
			</div>
			<div class="field">	
				<label>password<input placeholder="input password" type="password" name="password" size="15"></label>
					
				<?= (isset($error['password'])) ? Helper::showErrors('password', $error) : '' ; ?>
			</div>
		</div>
		<div class="clear"></div>
			<input class="submit btn btn-inverse" type="submit" name="submit" value="submit">
		</form>
		<a class="btn btn-inverse" href="/user/register">registration</a>
	</div>
</div>
