<div class="row">
	<div class="span4">
		<?php if(!empty($posts)) : ?>
			<?php foreach($posts as $content) : ?>
			<div class="post">
				<table>
					<tr><th><?= $content['title'] ?></th></tr>
					<tr><td><?= $content['body'] ?></td></tr>
					<tr><td>latitude - <?= rtrim($content['lat'], '0') ?></td></tr>
					<tr><td>longitude - <?= rtrim($content['lng'], '0') ?></td></tr>
					<tr><td><a class="btn btn-inverse" href="/post/update/<?= $content['id']?>">Update</a>
							<a class="btn btn-inverse" href="/post/delete/<?= $content['id']?>">Delete</a>
					</td></tr>
				</table>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
		<a class="btn btn-inverse" href="/post/create">Create</a>
		<a class="btn btn-inverse" href="/">Home</a>
	</div>
	<div class="span8">
		<div id="map" class="frame"></div>
	</div>
</div>
