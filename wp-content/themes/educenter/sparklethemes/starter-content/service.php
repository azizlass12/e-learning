<?php
/**
 * Service starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Courses', 'Theme starter content', 'educenter' ),
	'template' => 'full-width.php',
	'post_content' => '
	<!-- wp:pattern {"slug":"educenter/breadcrumb"} /-->
	
    <!-- wp:pattern {"slug":"educenter/course"} /-->
    <!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
    <!-- wp:pattern {"slug":"educenter/feature"} /-->
    <!-- wp:pattern {"slug":"educenter/course-2"} /-->
    <!-- wp:pattern {"slug":"educenter/cta"} /-->

    <!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

    
    ',
);