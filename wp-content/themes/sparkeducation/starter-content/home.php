<?php
/**
 * Home starter content.
 */
$default_home_content = '
	<!-- wp:pattern {"slug":"sparkedu/hero"} /-->
	<!-- wp:pattern {"slug":"sparkedu/cta"} /-->
	<!-- wp:pattern {"slug":"sparkedu/aboutus"} /-->
	<!-- wp:pattern {"slug":"sparkedu/category"} /-->
	<!-- wp:pattern {"slug":"sparkedu/course"} /-->
	<!-- wp:pattern {"slug":"sparkedu/cta-2"} /-->
	
	<!-- wp:pattern {"slug":"sparkedu/facility"} /-->
	<!-- wp:pattern {"slug":"sparkedu/team"} /-->
	<!-- wp:pattern {"slug":"sparkedu/counter"} /-->
	<!-- wp:pattern {"slug":"sparkedu/testimonials"} /-->
	<!-- wp:pattern {"slug":"sparkedu/newslater"} /-->
	<!-- wp:pattern {"slug":"sparkedu/footer"} /-->
';

return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'sparkeducation' ),
	'template' => 'full-width.php',
	'post_content' => $default_home_content,
);