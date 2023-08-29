<?php
/**
 * Home starter content.
 */
$default_home_content = '
	<!-- wp:pattern {"slug":"educenter/banner"} /-->
	<!-- wp:pattern {"slug":"educenter/feature"} /-->
	<!-- wp:pattern {"slug":"educenter/about-faq"} /-->
	<!-- wp:pattern {"slug":"educenter/cta"} /-->
	<!-- wp:pattern {"slug":"educenter/course"} /-->
	<!-- wp:pattern {"slug":"educenter/gallery"} /-->
	<!-- wp:pattern {"slug":"educenter/course-2"} /-->
	<!-- wp:pattern {"slug":"educenter/testimonial"} /-->
	<!-- wp:pattern {"slug":"educenter/team"} /-->
	<!-- wp:pattern {"slug":"educenter/blog"} /-->
';

return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'educenter' ),
	'template' => 'full-width.php',
	'post_content' => $default_home_content,
);