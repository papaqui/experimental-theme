<?php

function papaqui_files(){
  wp_enqueue_script('search', get_theme_file_uri('/js/search.js'), NULL, '1.0', true);
  wp_enqueue_script('the-icon', get_theme_file_uri('/js/the-icon.js'), NULL, '1.0', true);
  wp_enqueue_script('font-awesome', '//kit.fontawesome.com/c8be5b3ba9.js');
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Roboto&display=swap');
  wp_enqueue_style('papaqui_main_styles', get_stylesheet_uri());
  wp_enqueue_style('papaqui_queries_styles', get_template_directory_uri() . '/queries.css', 'screen');
}

add_action('wp_enqueue_scripts', 'papaqui_files');

function papaqui_features(){
  register_nav_menu('mainMenu', 'Main Menu');
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'papaqui_features');

/*****************
 * REGISTER SIDEBAR 
 ****************/
add_action( 'widgets_init', 'experimental_register_sidebars' );
function experimental_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );    
}

/*****************
 * My first widget 
 ****************/
// Creating the widget 
class experimental_widget extends WP_Widget {
  
  function __construct() {
  parent::__construct(
    
  // Base ID of your widget
  'experimental_widget', 
    
  // Widget name will appear in UI
  __('My first widget ', 'experimental_widget_domain'), 
    
  // Widget description
  array( 'description' => __( 'Sample widget based WPBeginner Tutorial', 'experimental_widget_domain' ), ) 
  );
  }
    
  // Creating widget front-end
    
  public function widget( $args, $instance ) {
  $title = apply_filters( 'widget_title', $instance['title'] );
    
  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $title ) )
  echo $args['before_title'] . $title . $args['after_title'];
    
  // This is where you run the code and display the output
  $widgetQuery = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'post'
  ));
  while($widgetQuery->have_posts()):
    $widgetQuery->the_post();
    the_title();
    echo('<br />');
  endwhile;
  echo __( 'Hello, World!', 'experimental_widget_domain' );
  echo $args['after_widget'];
  }
            
  // Widget Backend 
  public function form( $instance ) {
  if ( isset( $instance[ 'title' ] ) ) {
  $title = $instance[ 'title' ];
  }
  else {
  $title = __( 'New title', 'experimental_widget_domain' );
  }
  // Widget admin form
  ?>
  <p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
  </p>
  <?php 
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  return $instance;
  }
   
  // Class experimental_widget ends here
  } 
   
   
  // Register and load the widget
  function experimental_load_widget() {
      register_widget( 'experimental_widget' );
  }
  add_action( 'widgets_init', 'experimental_load_widget' );

  /*****************
 * Substitute a sentence with filter hook 
 ****************/
function replace_text($text){
  $text = str_replace('blog post', 'fiesta mexicana', $text);
  return $text;
}

add_filter('the_content', 'replace_text');


/** */
