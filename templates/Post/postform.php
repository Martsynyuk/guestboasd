<div id="message">
	<div id="close">X</div> 
	<div id="text"></div>
</div>
<form name="create" action="/post/<?= $action?><?= (isset($id)) ? '/' . $id : '' ;?>" method="POST">
	<div class="row">
		<div class="span3">
			<div class="field">
				<label>title<input placeholder="input topic" type="text" name="title" size="15" 
					value="<?= (isset($posts['title'])) ? Helper::showText('title', $posts) : ''; ?>"></label>
			
				<?= (isset($error['title'])) ? Helper::showErrors('title', $error) : '' ; ?>
			</div>
		</div>
		<div class="span3">
			<div class="field">	
				<label>text<textarea rows="4" cols="16" placeholder="input text" type="text" name="body" 
					size="15"><?= (isset($posts['body'])) ? Helper::showText('body', $posts) : ''; ?></textarea></label>
				
				<?= (isset($error['body'])) ? Helper::showErrors('body', $error) : '' ; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span3">
			<div class="field">	
				<label>latitude<input id="lat" placeholder="input latitude" type="text" name="lat" size="15" 
					value="<?= (isset($posts['lat'])) ? Helper::showText('lat', $posts) : ''; ?>"></label>
				
				<?= (isset($error['lat'])) ? Helper::showErrors('lat', $error) : '' ; ?>
			</div>
		</div>
		<div class="span3">
			<div class="field">	
				<label>longitude<input id="lng" placeholder="input longitude" type="text" name="lng" size="15" 
					value="<?= (isset($posts['lng'])) ? Helper::showText('lng', $posts) : ''; ?>"></label>
				
				<?= (isset($error['lng'])) ? Helper::showErrors('lng', $error) : '' ; ?>
			</div>	
		</div>
	</div>
	<div class="row">
		<input class="submit btn btn-inverse" type="submit" name="submit" value="submit">
	</div>
</form>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgnsp7HMAHLR_ntjubgpnt3A8evQvsgg"></script>
<script type="text/javascript" src="/webroot/js/createPost.js"></script>