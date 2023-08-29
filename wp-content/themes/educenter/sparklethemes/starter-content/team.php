<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Team', 'Theme starter content', 'educenter' ),
	'template' => 'full-width.php',
	'post_content' => '
	<!-- wp:pattern {"slug":"educenter/breadcrumb"} /-->
	<!-- wp:pattern {"slug":"educenter/team"} /-->
	
	<!-- wp:pattern {"slug":"educenter/service"} /-->

	<!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	',
);