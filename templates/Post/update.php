<form name="create" action="/post/update/<?= $id ?>" method="POST">
	<label>title<input placeholder="input topic" type="text" name="title" size="15" 
		value="<?= (isset($informations['title'])) ? Helper::showText('title', $informations) : ''; ?>"></label>
	
	<?= (isset($error['title'])) ? Helper::showErrors('title', $error) : '' ; ?>
	
	<label>text<textarea rows="5" cols="16" placeholder="input text" type="text" name="body" 
		size="15"><?= (isset($informations['body'])) ? Helper::showText('body', $informations) : ''; ?></textarea></label>
	
	<?= (isset($error['body'])) ? Helper::showErrors('body', $error) : '' ; ?>
	
	<label>latitude<input placeholder="input latitude" type="text" name="lat" size="15" 
		value="<?= (isset($informations['lat'])) ? Helper::showText('lat', $informations) : ''; ?>"></label>
	
	<?= (isset($error['lat'])) ? Helper::showErrors('lat', $error) : '' ; ?>
	
	<label>longitude<input placeholder="input longitude" type="text" name="lng" size="15" 
		value="<?= (isset($informations['lng'])) ? Helper::showText('lng', $informations) : ''; ?>"></label>
	
	<?= (isset($error['lng'])) ? Helper::showErrors('lng', $error) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">	
</form>
<a href="/">Home</a>
<a href="/post/my">my notation</a>