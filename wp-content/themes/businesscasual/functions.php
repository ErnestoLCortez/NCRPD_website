<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
 
	class Category_Dropdown_Custom_Control extends WP_Customize_Control {
	
		public function render_content() {
			
			// repurposed from class-wp-customize-control.php located in wp-includes
			
			$dropdown = wp_dropdown_categories(
				array(
					'name'             => '_customize-dropdown-cats-' . $this->id,
					'echo'             => 0,
					'show_option_none' => __( '&mdash; Select &mdash;', 'wap8theme-i18n' ),
					'selected'         => $this->value(),
					'class'            => 'customize-dropdown-cats'
				)
			);
			
			// hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		
		}
		
	}
 
}


	// enables wigitized sidebars
	if ( function_exists('register_sidebar') ) {

	
            // Header Widget
            // Location: right after the navigation
            /*register_sidebar(array('name'=>'Home',
                    'before_widget' => '<div class="widget-area widget-header"><ul>',
                    'after_widget' => '</ul></div>',
                    'before_title' => '<h4>',
                    'after_title' => '</h4>',
            ));*/
            // Footer Widget
            // Location: at the top of the footer, above the copyright
            register_sidebar(array('name'=>'Footer',
                    'before_widget' => '<div class="widget-area widget-footer col-lg-3"><br><ul class="well">',
                    'after_widget' => '</ul></div>',
                    'before_title' => '<h4>',
                    'after_title' => '</h4>',
            ));
        }
	// The Alert Widget
	// Location: displayed on the top of the home page, right after the header, right before the loop, within the content area
	/*register_sidebar(array('name'=>'Alert',
		'before_widget' => '<div class="widget-area widget-alert"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
*/
	// post thumbnail support
	add_theme_support( 'post-thumbnails' );
	// adds the post thumbnail to the RSS feed
	function cwc_rss_post_thumbnail($content) {
	    global $post;
	    if(has_post_thumbnail($post->ID)) {
	        $content = '<p>' . get_the_post_thumbnail($post->ID) .
	        '</p>' . get_the_content();
	    }
	    return $content;
	}
	add_filter('the_excerpt_rss', 'cwc_rss_post_thumbnail');
	add_filter('the_content_feed', 'cwc_rss_post_thumbnail');

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header-menu' => 'Header Menu',
	  		 // 'footer-menu' => 'Footer Menu',
	  		)
	  	);
	}
        /*$args = array(
            'default-color' => 'rgba(255,255,255,0.9)',
        );
	// custom background support
	add_theme_support( 'custom-background' );
        */
	

	// adds Post Format support
	// learn more: http://codex.wordpress.org/Post_Formats
	// add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );

	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	// removes the WordPress version from your header for security
	function wb_remove_version() {
		return '<!--built on the Whiteboard Framework-->';
	}
	add_filter('the_generator', 'wb_remove_version');
	
	
	// Removes Trackbacks from the comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}

	// invite rss subscribers to comment
	function rss_comment_footer($content) {
		if (is_feed()) {
			if (comments_open()) {
				$content .= 'Comments are open! <a href="'.get_permalink().'">Add yours!</a>';
			}
		}
		return $content;
	}

	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');

	// adds a class to the post if there is a thumbnail
	function has_thumb_class($classes) {
		global $post;
		if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
			return $classes;
	}
	add_filter('post_class', 'has_thumb_class');

	// add_action( 'admin_init', 'theme_options_init' );
	// add_action( 'admin_menu', 'theme_options_add_page' );
	
	// Init plugin options to white list our options
	// function theme_options_init(){
	// 	register_setting( 'tat_options', 'tat_theme_options', 'theme_options_validate' );
	// }
	
	// Load up the menu page
	// function theme_options_add_page() {
	// 	add_theme_page( __( 'Theme Options', 'tat_theme' ), __( 'Theme Options', 'tat_theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
	// }
	
	function new_excerpt_more( $more ) {
            return '<a href="'.get_permalink( get_the_ID() ).'" class="btn btn-default btn-lg">Read More</a>';
        }
        add_filter( 'excerpt_more', 'new_excerpt_more' );
        
        function tcx_register_theme_customizer( $wp_customize ) {
 
            $wp_customize->add_section(
                'bc_display_options',
                array(
                    'title'     => 'Theme Options',
                    'priority'  => 200
                )
            );
            
            $wp_customize->add_setting(
                'bc_post_id_carousel',
                array(
                    'default'    =>  '',
                    //'transport'  =>  'postMessage'
                )
            );
            
            $wp_customize->add_control(
                'bc_post_id_carousel',
                array(
                    'section'   => 'bc_display_options',
                    'label'     => 'Source Page for Corousel Images',
                    'type'      => 'dropdown-pages'
                )
            );
            
            $wp_customize->add_setting(
                'bc_home_cat_id',
                array(
                    'default'    =>  '',
                    //'transport'  =>  'postMessage'
                )
            );
            
            /*$wp_customize->add_control(
                'bc_home_page_id',
                array(
                    'section'   => 'bc_display_options',
                    'label'     => 'Page for home page',
                    'type'      => 'dropdown-pages'
                )
            );*/
            
            $wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'bc_home_cat_id', array(
                    'label'    => 'Home Page Posts Category',
                    'section'  => 'bc_display_options',
               )));
            
            
            $wp_customize->add_setting(
                'bc_footer_text',
                array(
                    'default'    =>  'Copyright © Company 2013',
                    //'transport'  =>  'postMessage'
                )
            );
            
            $wp_customize->add_control(
                'bc_footer_text',
                array(
                    'section'   => 'bc_display_options',
                    'label'     => 'Copyright Text',
                    'type'      => 'text'
                )
            );
            
            $wp_customize->add_setting(
                'bc_enable_comments',
                array(
                    'default'    =>  1,
                    //'transport'  =>  'postMessage'
                )
            );
            
            $wp_customize->add_control(
                'bc_enable_comments',
                array(
                    'section'   => 'bc_display_options',
                    'label'     => 'Enable Comments',
                    'type'      => 'checkbox'
                )
            );
            
            
            

            
 
        }
        add_action( 'customize_register', 'tcx_register_theme_customizer' );
        
        

?>