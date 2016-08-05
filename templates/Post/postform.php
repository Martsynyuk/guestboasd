<form name="create" action="/post/<?= $action?><?= (isset($id)) ? '/' . $id : '' ;?>" method="POST">
	<label>title<input placeholder="input topic" type="text" name="title" size="15" 
		value="<?= (isset($posts['title'])) ? Helper::showText('title', $posts) : ''; ?>"></label>
	
	<?= (isset($error['title'])) ? Helper::showErrors('title', $error) : '' ; ?>
	
	<label>text<textarea rows="5" cols="16" placeholder="input text" type="text" name="body" 
		size="15"><?= (isset($posts['body'])) ? Helper::showText('body', $posts) : ''; ?></textarea></label>
	
	<?= (isset($error['body'])) ? Helper::showErrors('body', $error) : '' ; ?>
	
	<label>latitude<input placeholder="input latitude" type="text" name="lat" size="15" 
		value="<?= (isset($posts['lat'])) ? Helper::showText('lat', $posts) : ''; ?>"></label>
	
	<?= (isset($error['lat'])) ? Helper::showErrors('lat', $error) : '' ; ?>
	
	<label>longitude<input placeholder="input longitude" type="text" name="lng" size="15" 
		value="<?= (isset($posts['lng'])) ? Helper::showText('lng', $posts) : ''; ?>"></label>
	
	<?= (isset($error['lng'])) ? Helper::showErrors('lng', $error) : '' ; ?>
	
	<input type="submit" name="submit" value="submit">	
</form>