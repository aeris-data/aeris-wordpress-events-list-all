<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;

$past_events = tribe_get_events(array(
		'eventDisplay'=>'past',
		'posts_per_page'=>5,
		'start_date'=>'01 '.$current_month.' 2015',
));

$new_events = tribe_get_events(array(
		'eventDisplay'=>'upcomming',
		'posts_per_page'=>5,
		'start_date'=>'01 '.$current_month.' 2017',
));

$allEvents = array();


foreach($past_events as $event){
	array_push($allEvents,$event);
	
}
foreach($new_events as $event){
	array_push($allEvents,$event);
	
}

$reversed = array_reverse($allEvents);


?>

<div class="tribe-events-loop">

	<?php foreach ( $reversed as $event) :  ?>

		<!-- Month / Year Headers -->
		<?php tribe_events_set_the_date_header($event); ?>
		<!-- Event  -->
		<?php
		$post_parent = '';
		if ( $event->post_parent ) {
			$event= ' data-parent-post-id="' . absint( $event->post_parent ) . '"';
		}
		?>
		<div id="post-" class="<?php tribe_events_event_classes() ?>" <?php echo $post_parent; ?>>
			<?php
			$event_type = tribe( 'tec.featured_events' )->is_featured( $event->ID ) ? 'featured' : 'event';
			/**
			 * Filters the event type used when selecting a template to render
			 *
			 * @param $event_type
			 */
			//
			$event_type = apply_filters( 'tribe_events_list_view_event_type', $event_type );
			//tribe_get_template_part( 'list/single', $event_type );
			?>
			<h2 class="tribe-events-list-event-title">
			<a class="tribe-event-url" href="<?php echo $event->guid; ?>" title="<?php echo $event->post_title; ?>" rel="bookmark">
			Agenda</a>
			</h2>
		</div>


		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endforeach; ?>

</div><!-- .tribe-events-loop -->
