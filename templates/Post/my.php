<?php if(!empty($posts)) : ?>
	<?php foreach($posts as $content) : ?>
		<table>
			<tr><th><?= $content['title'] ?></th></tr>
			<tr><td><?= $content['body'] ?></td></tr>
			<tr><td>latitude - <?= $content['lat'] ?></td></tr>
			<tr><td>longitude - <?= $content['lng'] ?></td></tr>
			<tr><td><a href="/post/update/<?= $content['id']?>">Update</a>
					<a href="/post/delete/<?= $content['id']?>">Delete</a>
			</td></tr>
		</table>
	<?php endforeach; ?>
<?php endif; ?>
<a href="/post/create">Create</a>
<a href="/">Home</a>