<?php

class Youtube_Subs_Count_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        'youtubesubscount_widget', 
        esc_html__( 'YouTube Subscription', 'ytsuco_domain' ), 
        array( 'description' => esc_html__( 'Widget to exhibit YouTube subscription button and count ', 'ytsuco_domain' ), ) 
        );
    }


    public function widget( $args, $instance ) {
        echo $args['before_widget']; 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }      
        echo '<div class="g-ytsubscribe" data-channel="'.esc_html($instance['channel']).'" data-layout="'.esc_html($instance['layout']).'" data-count="'.esc_html($instance['count']).'"></div>';
        echo $args['after_widget']; 
    }


    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'YouTube Subscription', 'ytsuco_domain' );       
        $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'youtube', 'ytsuco_domain' ); 
        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'ytsuco_domain' ); 
        $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'ytsuco_domain' ); 
    ?>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
            <?php esc_attr_e( 'Title:', 'ytsuco_domain' ); ?>
        </label> 

        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
            <?php esc_attr_e( 'Channel Name:', 'ytsuco_domain' ); ?>
        </label> 

        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $channel ); ?>">
    </p>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
            <?php esc_attr_e( 'Layout:', 'ytsuco_domain' ); ?>
        </label> 

        <select 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
            <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
            Default
            </option>
            <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
            Full
            </option>
        </select>
    </p>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
            <?php esc_attr_e( 'Count:', 'ytsuco_domain' ); ?>
        </label> 

        <select 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">
            <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
            Default
            </option>
            <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
            Hidden
            </option>
        </select>
    </p>
    <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
        $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
        $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';
        return $instance;
    }

} 



