<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Team', 'Theme starter content', 'sparkeducation' ),
	'template' => 'full-width.php',
	'post_content' => '
	<!-- wp:pattern {"slug":"sparkedu/breadcrumb"} /-->
	<!-- wp:pattern {"slug":"sparkedu/team"} /-->
	<!-- wp:pattern {"slug":"sparkedu/team-list"} /-->
	
	<!-- wp:pattern {"slug":"sparkedu/footer"} /-->
	',
);