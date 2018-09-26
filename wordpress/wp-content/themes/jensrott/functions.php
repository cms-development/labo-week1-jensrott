<?php 

/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
 // wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' );
    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
 // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}

function textdomain_register_sidebars() {
 
  /* Register the primary sidebar. */
  register_sidebar(
      array(
          'id' => 'unique-sidebar-id',
          'name' => __( 'Sidebar Name', 'textdomain' ),
          'description' => '',
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget' => '</aside>',
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>'
      )
  );

  /* Repeat register_sidebar() code for additional sidebars. */
}

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
add_action( 'widgets_init', 'textdomain_register_sidebars' );