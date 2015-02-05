<?php 

function loginModal() {
    $args = array(
            'echo'           => true,
            'redirect'       => site_url( $_SERVER['REQUEST_URI'] ), 
            'form_id'        => 'loginform',
            'label_username' => __( 'Username' ),
            'label_password' => __( 'Password' ),
            'label_remember' => __( 'Remember Me' ),
            'label_log_in'   => __( 'Log In' ),
            'id_username'    => 'user_login',
            'id_password'    => 'user_pass',
            'id_remember'    => 'rememberme',
            'id_submit'      => 'wp-submit',
            'remember'       => true,
            'value_username' => NULL,
            'value_remember' => false
    ); 
    wp_login_form( $args );
}


class ChapterLand_Login_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'chapterland_login_widget', // Base ID
			__( 'Chapterland Login', 'text_domain' ), // Name
			array( 'description' => __( 'A widget to provide simple login/logout functionality.', 'chapterland' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
        if( !is_user_logged_in() ) { 
            loginModal(); 
        } else { 
            echo $instance['logged_text']; 
        }
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'chapterland' );
		$logged_text = ! empty( $instance['logged_text'] ) ? $instance['logged_text'] : __( 'New text for logged-in users', 'chapterland' );
        
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
		<label for="<?php echo $this->get_field_id( 'logged_text' ); ?>"><?php _e( 'Text for Logged-In Users:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'logged_text' ); ?>" name="<?php echo $this->get_field_name( 'logged_text' ); ?>" type="text" value="<?php echo esc_attr( $logged_text ); ?>">
		</p>
		<?php 
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['logged_text'] = ( ! empty( $new_instance['logged_text'] ) ) ? strip_tags( $new_instance['logged_text'] ) : '';

		return $instance;
	}

} // class ChapterLand_Login_Widget

// register ChapterLand_Login_Widget
function register_Chapterland_Login_Widget() {
    register_widget( 'ChapterLand_Login_Widget' );
}
add_action( 'widgets_init', 'register_Chapterland_Login_Widget' );
?> 