<?php 
defined('ABSPATH') or die("Cannot access pages directly.");

if (!class_exists("skeletonclass_widgets")) {

	class skeletonclass_widgets {
	
		function skeletonclass_widgets()
		{
			$this->__construct();
		} // function
	
		function __construct()
		{

			add_action('widgets_init', array( &$this, 'skeletonclass_register_widgets' ));

		} // __construct

		function skeletonclass_register_widgets()
		{
			register_widget("skeletonclass_cpt_Widget");
		}	
	
	} // class

} //End if class exists

/**
 * Custom Post Type Widget Class
 */
class skeletonclass_cpt_Widget extends WP_Widget {

    /** constructor */
    function skeletonclass_cpt_Widget() {
        parent::WP_Widget(false, $name = 'Skeleton Slider Widget');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		global $wpdb;

        $title = apply_filters('widget_title', $instance['title']);

			echo $before_widget;

			if ( ! empty( $title ) )
				echo $before_title . $title . $after_title; ?>

					<div class="flexslider-widget">
					    <ul class="slides">
							<?php
							global $post;
							 $slidesquery_args = array(
								'post_type' => array('slide'), //custom post type
								'showposts' => '-1',
								'orderby' => 'date',
								'order' => 'desc'
							);

							$slides = new WP_Query($slidesquery_args); 
							while ($slides->have_posts()) : $slides->the_post(); 

							?>

						    	<li>
						    		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('book-slide'); ?></a><br />
						    		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
						    	</li>
							
							<?php endwhile; wp_reset_postdata(); ?>
					    </ul>
					</div>
								
            <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

        $title = esc_attr($instance['title']);

        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <?php
    }

} // class skeletonclass_books_Widget


//For another widget you would create a brand new class, changing all of its settings and features, then calling a new widget in the skeletonclass_register_widgets function
