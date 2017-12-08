<?php


class Aeris_Events_Calendar_Widget extends WP_Widget {
	
	
	/** constructor -- name this the same as the class above */
	function aeris_events_calendar_widget() {
		
		$widget_ops = array( 'description' => __('Use this widget to setup events calendar.') );
		parent::__construct( 'aeris_events_calendar_widget', __('Aeris Widget Calendar'), $widget_ops );
	}
	
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		echo "calendrier evenements";
		
		include_once 'calendar-widget.php';
		
		echo $after_widget;
		
	}
	
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['offset'] = strip_tags($new_instance['offset']);
		
		return $instance;
	}
	
	/** @see WP_Widget::form -- do not rename this */
	function form($instance) {
		
		$title = esc_attr($instance['title']);
		$number = esc_attr($instance['number']);
		$offset = esc_attr($instance['offset']);
		?>
    	<aeris-button></aeris-button>
    	
    <?php }
 
 	
}