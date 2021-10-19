<?php
/**
 * Add Recent Post Widget.
 * @package Pixer
 */
if( !class_exists('Pixer_About') ){
	class Pixer_About extends WP_Widget{
		/**
		 * Register widget with WordPress.
		 */
		function __construct(){

			$widget_options = array(
				'description'					=> esc_html__('About Pixer Widgets here', 'pixer'),
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('Pixer_About', esc_html__( 'About : Pixer', 'Pixer'), $widget_options );

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


		$footer_logo = ( ! empty( $instance['footer_logo'] ) ) ? $instance['footer_logo'] : '';
		$short_description = ( ! empty( $instance['short_description'] ) ) ? $instance['short_description'] : esc_html__( 'A design is plan or specification for the construction','Pixer' );

		$Pixer_address = ( ! empty( $instance['Pixer_address'] ) ) ? $instance['Pixer_address'] : esc_html__( 'Central Park Hall, 8859 Queens, NY','Pixer' );
		$Pixer_email = ( ! empty( $instance['Pixer_email'] ) ) ? $instance['Pixer_email'] : esc_html__( 'info@petzone.com','Pixer' );
		$Pixer_phone = ( ! empty( $instance['Pixer_phone'] ) ) ? $instance['Pixer_phone'] : esc_html__( '+1 326 585 999','Pixer' );


		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


			echo $args['before_widget']; ?>

			<div class="footer-widget">
				<?php if ($footer_logo): ?>
				<div class="footer-logo mb-20">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $footer_logo ) ?>" alt="<?php echo esc_attr( $title ); ?>"></a>
				</div>
				<?php endif ?>
				<div class="footer-content">
					<p><?php echo esc_html( $short_description ) ?></p>
					<ul class="footer-info-list">
						<li><i class="fas fa-map-signs"></i> <?php echo esc_html( $Pixer_address ) ?></li>
						<li><i class="fas fa-envelope"></i><?php echo esc_html( $Pixer_email ) ?></li>
						<li><i class="fas fa-headphones"></i> <?php echo esc_html( $Pixer_phone ) ?></li>
					</ul>
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
			$instance['footer_logo'] = sanitize_text_field( $new_instance['footer_logo'] );
			$instance['short_description'] = sanitize_text_field( $new_instance['short_description'] );
			$instance['Pixer_address'] = sanitize_text_field( $new_instance['Pixer_address'] );
			$instance['Pixer_email'] = sanitize_text_field( $new_instance['Pixer_email'] );
			$instance['Pixer_phone'] = sanitize_text_field( $new_instance['Pixer_phone'] );
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
		$footer_logo     = isset( $instance['footer_logo'] ) ? esc_attr( $instance['footer_logo'] ) : '';
		$short_description     = isset( $instance['short_description'] ) ? esc_attr( $instance['short_description'] ) : '';
		$Pixer_address     = isset( $instance['Pixer_address'] ) ? esc_attr( $instance['Pixer_address'] ) : '';
		$Pixer_email     = isset( $instance['Pixer_email'] ) ? esc_attr( $instance['Pixer_email'] ) : '';
		$Pixer_phone     = isset( $instance['Pixer_phone'] ) ? esc_attr( $instance['Pixer_phone'] ) : '';
		?>


		<p>
	        <label for="<?php echo esc_attr($this->get_field_id( 'footer_logo' )); ?>">
				<?php echo esc_html__( 'Upload Logo:','Pixer' ); ?>
			</label>


	        <img class="<?php echo esc_attr($this->get_field_id( 'footer_logo' )); ?>_img" src="<?php echo esc_url($footer_logo); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>

	        <input type="text" class="widefat <?php echo esc_attr($this->get_field_id( 'footer_logo' )); ?>_url" name="<?php echo esc_attr($this->get_field_name( 'footer_logo' )); ?>" value="<?php echo esc_attr($footer_logo); ?>" style="margin-top:5px;" />
	        <input type="button" id="<?php echo esc_attr($this->get_field_id( 'footer_logo' )); ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
	    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'short_description' )); ?>"><?php echo esc_html__( 'Short description:','Pixer' ); ?></label>
			<textarea class="widefat" rows="5" cols="30" id="<?php echo esc_attr($this->get_field_id( 'short_description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'short_description' )); ?>"><?php echo stripslashes( $short_description ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'Pixer_address' )); ?>"><?php echo esc_html__( 'Location:','Pixer' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'Pixer_address' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'Pixer_address' )); ?>" type="text" value="<?php echo esc_attr($Pixer_address); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'Pixer_email' )); ?>"><?php echo esc_html__( 'Email:','Pixer' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'Pixer_email' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'Pixer_email' )); ?>" type="text" value="<?php echo esc_attr($Pixer_email); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'Pixer_phone' )); ?>"><?php echo esc_html__( 'Phone No:','Pixer' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'Pixer_phone' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'Pixer_phone' )); ?>" type="text" value="<?php echo esc_attr($Pixer_phone); ?>" />
		</p>

	<?php
		}
	}
}



// register Contact  Widget widget
function Pixer_About(){
	register_widget('Pixer_About');
}
add_action('widgets_init','Pixer_About');