<?php
	/**
	 * Single Event Template
	 * A single event. This displays the event title, description, meta, and
	 * optionally, the Google map for the event.
	 *
	 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
	 *
	 * @package TribeEventsCalendar
	 * @version 4.6.3
	 *
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		die( '-1' );
	}

	$events_label_singular = tribe_get_event_label_singular();
	$events_label_plural   = tribe_get_event_label_plural();

	$event_id = get_the_ID();

	$featured_image			= get_field("featured_image");

	if ($featured_image) {
		$featured_image_url = $featured_image["url"];
	}
?>

<div id="tribe-events-content" class="module left columns white">
	<div class="inner columns-inner">
		
		<?php
		if ($featured_image) {
			$featured_image_url = $featured_image["url"];
			echo("<div><img src=\"".$featured_image_url."\" /></div>");
		}
		?>

		<div>
			<p class="tribe-events-back">
				<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
			</p>

			<!-- Notices -->
			<div class="tribe-events-schedule tribe-clearfix tribe-date-time">
				<?php echo tribe_events_event_schedule_details( $event_id, '<b>', '</b>' ); ?>
				<?php if ( tribe_get_cost() ) : ?>
					<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
				<?php endif; ?>
			</div>
			<hr class="blue" />

			<?php tribe_the_notices() ?>

			
			<?php the_title( '<h3 class="tribe-events-single-event-title">', '</h3>' ); ?>


		<!-- Event header -->
		<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
			<!-- Navigation -->
			<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
				<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
			</ul>
			<!-- .tribe-events-sub-nav -->
		</div>
		<!-- #tribe-events-header -->

		<?php while ( have_posts() ) :  the_post(); ?>
			<p id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Event featured image, but exclude link -->
				<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

				<!-- Event content -->
				<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
				<div class="tribe-events-single-event-description tribe-events-content">
					<?php the_content(); ?>
				</div>
				<!-- .tribe-events-single-event-description -->

			</p> 
		<?php endwhile; ?>

	</div>
</div><!-- #tribe-events-content -->

<!-- Event meta -->
<div class="module left columns gray">
	<div class="inner columns-inner">
		<?php 
			do_action( 'tribe_events_single_event_before_the_meta' );
			
			tribe_get_template_part( 'modules/meta' );
			do_action( 'tribe_events_single_event_after_the_meta' );
		?>
	</div>
</div>