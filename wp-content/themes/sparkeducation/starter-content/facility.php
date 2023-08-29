<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Facility', 'Theme starter content', 'sparkeducation' ),
    'template' => 'full-width.php',
	'post_content' => '
	<!-- wp:pattern {"slug":"sparkedu/breadcrumb"} /-->
	
	<!-- wp:pattern {"slug":"sparkedu/facility-list"} /-->
	<!-- wp:pattern {"slug":"sparkedu/newslater"} /-->
	<!-- wp:pattern {"slug":"sparkedu/footer"} /-->
    '

	
);