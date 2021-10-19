<?php
/**
 * Add Recent Post Widget.
 * @package Pixer
 */
if( !class_exists('Pixer_subscribe') ){
	class Pixer_subscribe extends WP_Widget{
		/**
		 * Register widget with WordPress.
		 */
		function __construct(){

			$widget_options = array(
				'description'					=> esc_html__('Newsletter', 'Pixer'),
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('Pixer_subscribe', esc_html__( 'Pixer: Newsletter', 'Pixer'), $widget_options );

		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){

			if ( ! isset( $args['widget_id'] ) ) {

			$args['widget_id'] = $this->id;

		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'About Author','Pixer' );
		$profile_image = ( ! empty( $instance['profile_image'] ) ) ? $instance['profile_image'] : '';
		$short_description = ( ! empty( $instance['short_description'] ) ) ? $instance['short_description'] : esc_html__( 'Making for beauty especially the','Pixer' );
		$shortcode = ( ! empty( $instance['shortcode'] ) ) ? $instance['shortcode'] : esc_html__( '','Pixer' );
		$sub_title = ( ! empty( $instance['sub_title'] ) ) ? $instance['sub_title'] : esc_html__( '100% Confidential','Pixer' );
		$sub_desc = ( ! empty( $instance['sub_desc'] ) ) ? $instance['sub_desc'] : esc_html__( '35k Active Customer','Pixer' );

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


			echo $args['before_widget']; ?>

<div class="footer-widget">
	<?php if ( $title ):
		echo $args['before_title'];
		echo esc_attr( $title );
		echo $args['after_title'];
	endif;  ?>

	<div class="footer-newsletter-wrap">
		<p><?php echo esc_html( $short_description ) ?> <span>*</span></p>
		<?php echo do_shortcode( $shortcode ); ?>
	</div>
	<div class="footer-confi-wrap">
		<div class="confi-logo">
			<img src="<?php echo esc_url( $profile_image ) ?>" alt="<?php echo esc_attr( $title ); ?>">
		</div>
		<div class="confi-content">
			<h4><?php echo esc_html( $sub_title ) ?></h4>
			<span><?php echo esc_html( $sub_desc ) ?></span>
		</div>
	</div>
</div>

			<?php echo $args['after_widget']; ?>

			<?php wp_reset_postdata();
		}
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['profile_image'] = sanitize_text_field( $new_instance['profile_image'] );
			$instance['short_description'] = sanitize_text_field( $new_instance['short_description'] );
			$instance['shortcode'] = sanitize_text_field( $new_instance['shortcode'] );
			$instance['sub_title'] = sanitize_text_field( $new_instance['sub_title'] );
			$instance['sub_desc'] = sanitize_text_field( $new_instance['sub_desc'] );
			return $instance;
		}

	 	/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */

		public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$profile_image     = isset( $instance['profile_image'] ) ? esc_attr( $instance['profile_image'] ) : '';
		$short_description     = isset( $instance['short_description'] ) ? esc_attr( $instance['short_description'] ) : '';
		$shortcode     = isset( $instance['shortcode'] ) ? esc_attr( $instance['shortcode'] ) : '';
		$sub_title     = isset( $instance['sub_title'] ) ? esc_attr( $instance['sub_title'] ) : '';
		$sub_desc     = isset( $instance['sub_desc'] ) ? esc_attr( $instance['sub_desc'] ) : '';
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:','Pixer' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'short_description' )); ?>"><?php echo esc_html__( 'Short description:','Pixer' ); ?></label>
			<textarea class="widefat" rows="5" cols="30" id="<?php echo esc_attr($this->get_field_id( 'short_description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'short_description' )); ?>"><?php echo stripslashes( $short_description ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'shortcode' )); ?>"><?php echo esc_html__( 'Shortcode:','Pixer' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'shortcode' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'shortcode' )); ?>" type="text" value="<?php echo esc_attr($shortcode); ?>" />
		</p>





		<p>
	        <label for="<?php echo esc_attr($this->get_field_id( 'profile_image' )); ?>"><?php echo esc_html__( 'Newsletter image:','Pixer' ); ?></label>
	        <img class="<?php echo esc_attr($this->get_field_id( 'profile_image' )); ?>_img" src="<?php echo esc_url($profile_image); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
	        <input type="text" class="widefat <?php echo esc_attr($this->get_field_id( 'profile_image' )); ?>_url" name="<?php echo esc_attr($this->get_field_name( 'profile_image' )); ?>" value="<?php echo esc_attr($profile_image); ?>" style="margin-top:5px;" />
	        <input type="button" id="<?php echo esc_attr($this->get_field_id( 'profile_image' )); ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
	    </p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'sub_title' )); ?>"><?php echo esc_html__( 'Sub Title:','Pixer' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sub_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sub_title' )); ?>" type="text" value="<?php echo esc_attr($sub_title); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'sub_desc' )); ?>"><?php echo esc_html__( 'Sub Discribtion:','Pixer' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sub_desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sub_desc' )); ?>" type="text" value="<?php echo esc_attr($sub_desc); ?>" />
		</p>

	<?php
		}
	}
}



// register Contact  Widget widget
function Pixer_subscribe(){
	register_widget('Pixer_subscribe');
}
add_action('widgets_init','Pixer_subscribe');