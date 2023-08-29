<?php
add_filter('educenter_starter_content', function($starter_contnt){
    $starter_contnt['posts'] =  array(
        'home'    => require __DIR__ . '/home.php',
        'services' => require __DIR__ . '/service.php',
        'blog' => require __DIR__ . '/blog.php',
        'team' => require __DIR__ . '/team.php',
        'team-detail' => require __DIR__ . '/team-detail.php',
        'facility' => require __DIR__ . '/facility.php',
    );
    
    $starter_contnt['nav_menus'] = array(
        'menu-1' => array(
            'name' => __( 'Primary Menu', 'sparkeducation' ),
            'items' => array(
                'page_home',
                'page_blog',
                
                'page_service' => array(
                    'type' => 'post_type',
                    'object' => 'page',
                    'object_id' => '{{services}}',
                ),

                'page_team' => array(
                    'type' => 'post_type',
                    'object' => 'page',
                    'object_id' => '{{team}}',
                ),
                'page_team_detail' => array(
                    'type' => 'post_type',
                    'object' => 'page',
                    'object_id' => '{{team-detail}}',
                ),
                'page_facility' => array(
                    'type' => 'post_type',
                    'object' => 'page',
                    'object_id' => '{{facility}}',
                ),
            ),
        ),
    );

    return $starter_contnt;
}, 100, 1);


add_filter('educenter_starter_content_theme_mods', function($modes){
    $modes['educenter_top_header'] = 1;
    $modes['educenter_phone_number'] = '+01 (977) 2599 12';
    $modes['educenter_social_media'] = json_encode( array(
                array(
                    'icon' => 'fab fa-facebook-f',
                    'link' => "#"
                ),
                array(
                    'icon' => 'fab fa-twitter',
                    'link' => '#'
                ),
                array(
                    'icon' => 'fab fa-instagram',
                    'link' => '#'
                ),
                array(
                    'icon' => 'fab fa-pinterest',
                    'link' => '#'
                ),
                array(
                    'icon' => 'fab fa-linkedin',
                    'link' => '#'
                ),

                array(
                    'icon' => 'fab fa-youtube',
                    'link' => '#'
                )
            ));



    return $modes;
}, 100, 1);