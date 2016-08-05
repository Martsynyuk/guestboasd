<?php if(!empty($posts)) : ?>
	<?php foreach($posts as $content) : ?>
		<table>
			<tr><th><?= $content['title'] ?></th></tr>
			<tr><td><?= $content['body'] ?></td></tr>
			<tr><td>latitude - <?= $content['lat'] ?></td></tr>
			<tr><td>longitude - <?= $content['lng'] ?></td></tr>
		</table>
	<?php endforeach; ?>
<?php endif; ?>
<a href="/post/create">Create</a>
<a href="/post/my">my notation</a>

