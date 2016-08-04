<?php
foreach($informations as $content) {
echo '<ul>
		<li><b>' . $content['title'] . '</b></li>
			<p>' . $content['body'] . '</p>
			<p>latitude - ' . $content['lat'] . '</p>
			<p>longitude - ' . $content['lng'] . '</p>
	</ul>';
}
?>
<a href="/post/my">my notation</a>
<a href="/post/create">Create</a>
