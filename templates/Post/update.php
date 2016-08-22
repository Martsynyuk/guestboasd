<div class="row">
	<div id="map" class="frame"></div>
</div>	
<div class="row">
	<?php include 'postform.php' ?>
	<div class="row">
		<a class="btn btn-inverse" href="/">Home</a>
		<a class="btn btn-inverse" href="/post/my">my notation</a>
	</div>
</div>
<script>
	requirejs(['createPost'], function () {});
</script>