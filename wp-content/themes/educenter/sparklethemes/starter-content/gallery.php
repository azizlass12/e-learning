<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Gallery', 'Theme starter content', 'educenter' ),
	'thumbnail'    => '{{featured-image-home}}',
	'template' => 'full-width.php',
	'post_content' => '
		<!-- wp:pattern {"slug":"educenter/breadcrumb"} /-->

		<!-- wp:pattern {"slug":"educenter/gallery"} /-->
		<!-- wp:pattern {"slug":"educenter/feature"} /-->
	',
);