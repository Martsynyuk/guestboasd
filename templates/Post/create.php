<form name="create" action="create" method="POST">
	<label>title<input placeholder="input topic" type="text" name="title" size="15"></label>
	
	<?= (isset($error['title'])) ? Helper::showErrors('title', $error) : '' ; ?>
	
	<p>text</p><textarea rows="5" cols="16" placeholder="input text" type="text" name="body" size="15"></textarea>
	
	<?= (isset($error['body'])) ? Helper::showErrors('body', $error) : '' ; ?>
	
	<label>latitude<input placeholder="input latitude" type="text" name="lat" size="15"></label>
	
	<?= (isset($error['lat'])) ? Helper::showErrors('lat', $error) : '' ; ?>
	
	<label>longitude<input placeholder="input longitude" type="text" name="lng" size="15"></label>
	
	<?= (isset($error['lng'])) ? Helper::showErrors('lng', $error) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">	
</form>