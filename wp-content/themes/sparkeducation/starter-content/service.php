<?php
/**
 * Service starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Courses', 'Theme starter content', 'sparkeducation' ),
	'template' => 'full-width.php',
	'post_content' => '
	<!-- wp:pattern {"slug":"sparkedu/breadcrumb"} /-->
	
    <!-- wp:pattern {"slug":"sparkedu/course"} /-->
    <!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
    
    <!-- wp:pattern {"slug":"educenter/course-2"} /-->
	
	<!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

    <!-- wp:pattern {"slug":"sparkedu/cta"} /-->

	<!-- wp:pattern {"slug":"sparkedu/newslater"} /-->
    <!-- wp:pattern {"slug":"sparkedu/footer"} /-->

    
    ',
);