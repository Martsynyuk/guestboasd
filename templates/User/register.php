<div class="row">
	<div class="span4">
		<form name="autorization" action="register" method="POST">
		<div class="fields">
			<div class="field">
				<label>username<input placeholder="input name" type="text" name="username" size="15"></label>
				
				<?= (isset($error['username'])) ? Helper::showErrors('username', $error) : '' ; ?>
			</div>
			<div class="field">	
				<label>email<input placeholder="input email" type="mail" name="email" size="15"></label>
				
				<?= (isset($error['email'])) ? Helper::showErrors('email', $error) : '' ; ?>
			</div>
			<div class="field">	
				<label>password<input placeholder="input password" type="password" name="password" size="15"></label>
				
				<?= (isset($error['password'])) ? Helper::showErrors('password', $error) : '' ; ?>
			</div>
			<div class="field">	
				<label>confirm password<input placeholder="confirm password" type="password" name="confirmpassword" size="15"></label>
				
				<?= (isset($error['confirmpassword'])) ? Helper::showErrors('confirmpassword', $error) : '' ; ?>
			</div>
		</div>
		<div class="clear"></div>	
			<input class="submit btn btn-inverse" type="submit" name="submit" value="submit">
		</form>
		<a class="btn btn-inverse" href="/user/login">login</a>
	</div>
</div>