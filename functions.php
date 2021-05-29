<?php
/**
 * Minilog functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package    MiniLog
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

if ( ! function_exists( 'minilog_setup' ) ) {
	/**
	 * Setup theme and make features available
	 */
	function minilog_setup() {
		load_theme_textdomain( 'minilog' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'widgets' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-background' );
	}
}

add_action( 'after_setup_theme', 'minilog_setup' );
add_action( 'widgets_init', 'minilog_widgets_init' );
add_filter( 'use_default_gallery_style', '__return_false' );

if ( ! function_exists( 'minilog_scripts' ) ) {
	/**
	 * Setup theme styles and scripts
	 */
	function minilog_scripts() {
		// Load google font.
		wp_enqueue_style( 'Google-font-B612', 'https://fonts.googleapis.com/css2?family=B612&display=swap' ); // phpcs:ignore
		wp_enqueue_style( 'minilog-style', get_stylesheet_uri() ); // phpcs:ignore
		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'minilogjs', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), null, true ); // phpcs:ignore
	}
}

add_action( 'wp_enqueue_scripts', 'minilog_scripts' );

if ( ! function_exists( 'minilog_menus' ) ) {
	/**
	 * Register multiple menus
	 */
	function minilog_menus() {
		register_nav_menus(
			array(
				'top_menu'    => __( 'Top Menu', 'minilog' ),
				'footer_menu' => __( 'Footer Menu', 'minilog' ),
			)
		);
	}
}

add_action( 'init', 'minilog_menus' );

if ( ! function_exists( 'minilog_widgets_init' ) ) {
	/**
	 * Sidebar feature
	 */
	function minilog_widgets_init() {
		$args = array(
			'name'          => __( 'Sidebar', 'minilog' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li class="widget">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		);
		register_sidebar( $args );
	}
}



if ( ! function_exists( 'minilog_excerpt' ) ) {
	/**
	 * Manage excertp length
	 *
	 * @param string $link - Read more text with link.
	 */
	function minilog_excerpt( $link ) {
		if ( is_admin() ) {
			return $link;
		}
		$link = sprintf(
			'<div><a href="%1$s" class="more">%2$s</a></div>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Read more &raquo;<span class="screen-reader-text"> "%s"</span>', 'minilog' ), get_the_title( get_the_ID() ) )
		);
		return ' &hellip; ' . $link;
	}
}

add_filter( 'excerpt_more', 'minilog_excerpt' );

if ( ! function_exists( 'minilog_breadcrumb' ) ) {
	/**
	 * Breadcrum feature
	 */
	function minilog_breadcrumb() {
		global $post;
		if ( is_home() || is_front_page() ) {
			// Filler to maintain margin.
			printf( '<div id="breadcrumbs">&nbsp;</div>' );

			/**
			 * You can replace the above line with the following line if you want the breadcrumb displayed in home page as well
			 * printf( '<div id="breadcrumbs"><a href="%1$s">&ldquo;%2$s&rdquo;</a> &raquo;', esc_url( home_url( '/' ) ), __( 'Home', 'minilog' ) );
			*/
		} else {

			printf( '<div id="breadcrumbs"><a href="%1$s">%2$s</a> &raquo; ', esc_url( home_url( '/' ) ), esc_html__( 'Home', 'minilog' ) );
			if ( is_category() ) {
				$this_category = get_category( get_query_var( 'cat' ), false );
				if ( 0 !== $this_category->parent ) {
					echo esc_html( get_category_parents( $this_category->parent, true, ' &raquo; ' ) );
				}
				printf( '<span class="current"> %1$s &ldquo;%2$s&rdquo;</span>', esc_html__( 'Category', 'minilog' ), esc_html( single_cat_title( '', false ) ) );
			} elseif ( is_search() ) {
				// Search results.
				printf( '<span class="current"> %1$s &ldquo;%2$s&rdquo; </span>', esc_html__( 'Search results for ', 'minilog' ), esc_html( get_search_query() ) );
			} elseif ( is_day() ) {
				// Archive by date.
				printf( '<span class="current"> <a href="%1$s"> %2$s </a> </span>&raquo;', esc_url( get_year_link( get_the_time( 'Y' ) ) ), esc_html( get_the_time( 'Y' ) ) );
				printf( '<span class="current"> <a href="%1$s"> %2$s </a> </span>&raquo;', esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ), esc_html( get_the_time( 'F' ) ) );
				printf( '<span class="current"> %s</span>', esc_html( get_the_time( 'd' ) ) );

			} elseif ( is_month() ) {
				// Archive by month.
				printf( '<span class="current"> <a href="%1$s"> %2$s </a> </span>&raquo;', esc_url( get_year_link( get_the_time( 'Y' ) ) ), esc_html( get_the_time( 'Y' ) ) );
				printf( '<span class="current"> %s</span>', esc_html( get_the_time( 'F' ) ) );

			} elseif ( is_year() ) {
				// Archive by year.
				printf( '<span class="current"> %s</span>', esc_html( get_the_time( 'Y' ) ) );

			} elseif ( is_single() && ! is_attachment() ) {
				// Get Category for Single posts.
					$cat  = get_the_category();
					$cat  = array_shift( $cat );
					$cats = get_category_parents( $cat, true, ' &raquo; ' );
				if ( ! is_wp_error( $cats ) ) {
					$cats = get_category_parents( $cat, true, ' &raquo; ' );
				} else {
					$cats = '';
				}
				echo $cats;
				printf( '<span class="current"> %s </span>', esc_html( get_the_title() ) );

			} elseif ( is_attachment() ) {
				// Get post information for Attachments.
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID );
				$cat    = array_shift( $cat );
				echo esc_html( get_category_parents( $cat, true, ' &raquo; ' ) );
				printf( '<span class="current"> <a href="%1$s"> %2$s </a> </span>', esc_url( get_permalink( $parent ) ), esc_html( $parent->post_title ) );
				printf( '<span class="current"> &raquo; &ldquo;%s&rdquo; </span>', esc_html( get_the_title() ) );

			} elseif ( is_page() && ! $post->post_parent ) {
				// Pages without parent posts.
				printf( '<span class="current"> %s </span>', esc_html( get_the_title() ) );

			} elseif ( is_page() && $post->post_parent ) {
				// Child pages ( pages with parent posts ).
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page          = get_page( $parent_id );
					$breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
					$parent_id     = $page->post_parent;
				}
				$breadcrumbs       = array_reverse( $breadcrumbs );
				$breadcrumbs_count = count( $breadcrumbs );
				for ( $i = 0; $i < $breadcrumbs_count; $i++ ) {
					echo esc_html( $breadcrumbs[ $i ] );
					if ( $i !== $breadcrumbs_count - 1 ) {
						echo ' &raquo; ';
					}
				}
				printf( ' &raquo; <span class="current"> %s </span>', esc_html( get_the_title() ) );

			} elseif ( is_tag() ) {
				// Display tag.
				printf( '<span class="current"> %1$s &ldquo;%2$s&rdquo; </span>', esc_html_e( 'Posts tagged ', 'minilog' ), esc_html( single_tag_title( '', false ) ) );

			} elseif ( is_author() ) {
				// Display author.
				global $author;
				$userdata = get_userdata( $author );
				printf( '<span class="current"> %1$s &ldquo;%2$s&rdquo; </span>', esc_html__( 'Articles posted by ', 'minilog' ), esc_html( $userdata->display_name ) );

			} elseif ( is_404() ) {
				// 404 Not Found
				printf( '<span class="current"> %s</span>', esc_html__( 'Error 404', 'minilog' ) );
			}

			// Get page details for multiple pages.
			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ' ( ';
					echo esc_html__( 'Page', 'minilog' ) . ' ' . esc_html( get_query_var( 'paged' ) );
				}
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ' )';
				}
			}
			echo '</div>';
		}
	}
}
