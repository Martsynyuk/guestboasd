<?php
if(!empty($informations)) {
	foreach($informations as $content) {
		echo '<ul>
			<li><b>' . $content['title'] . '</b></li>
				<p>' . $content['body'] . '</p>
				<p>latitude - ' . $content['lat'] . '</p>
				<p>longitude - ' . $content['lng'] . '</p>
				<a href="/post/update/' . $content['id'] . '">Update</a>
				<a href="/post/delete/' . $content['id'] . '">Delete</a>
		</ul>';
	}
	echo '<a href="/">Home</a>';
} else {
	echo '<a href="/post/create">Create</a>
		  <a href="/">Home</a>';
}
?>