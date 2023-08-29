<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Blog', 'Theme starter content', 'educenter' ),
	'post_content' => '
	<!-- wp:pattern {"slug":"educenter/breadcrumb"} /-->
	
	<!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:pattern {"slug":"educenter/latest-news"} /-->

	<!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->',
);