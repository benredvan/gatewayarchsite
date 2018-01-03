<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.3
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();


$featured_image			= get_field("featured_image");
$buy_tickets_link		= get_field("buy_tickets_link");
$admission_types		= get_field("admission_types");
$admission_footer_html	= get_field("admission_footer_html");
?>

<?php 
if ($featured_image) {
	$featured_image_url = $featured_image["url"];
	echo("<div class='single-event-image' style='background-image:url(".$featured_image_url.");'></div>");
}
?>
<div class='single-event-content'>
	<div class="buttonset">
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="button blue tribe-events-read-more" rel="">MORE INFO</a>

		<?php
		if ($buy_tickets_link) {
			echo("<a href=\"".$buy_tickets_link."\" class=\"button bluereverse\" target=\"_blank\">Buy Tickets</a>");
		}?>
	</div>

	<!-- Event Title -->
	<?php do_action( 'tribe_events_before_the_event_title' ) ?>
	<h2 class="tribe-events-list-event-title">
		<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
			<?php the_title() ?>
		</a>
	</h2>
	<?php do_action( 'tribe_events_after_the_event_title' ) ?>


	<!-- Event Cost -->


	<?php
		/*
		if ($admission_types) {
			echo("<div>");
			foreach($admission_types as $type) {
				$label = $type["admission_type"];
				$price = $type["admission_price"];
				
				echo($label.": $".number_format($price,2)."<br>");
			}
			echo("</div>");
		}

		if ($admission_footer_html) {
			echo($admission_footer_html);
		}
		*/
	?>
	<?php if ( tribe_get_cost() ) : ?>
		<div class="tribe-events-event-cost">
			<span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
			<?php
			/**
			 * Runs after cost is displayed in list style views
			 *
			 * @since 4.5
			 */
			do_action( 'tribe_events_inside_cost' )
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'tribe_events_after_the_meta' ) ?>

	<!-- Event Image -->
	<?php echo tribe_event_featured_image( null, 'medium' ); ?>

	<!-- Event Content -->
	<?php do_action( 'tribe_events_before_the_content' ); ?>
	<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
		
		<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>

	</div><!-- .tribe-events-list-event-description -->

	<!-- Event Meta -->
	<?php do_action( 'tribe_events_before_the_meta' ) ?>
	<div class="tribe-events-event-meta">
		<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

			<!-- Schedule & Recurrence Details -->
			<div class="tribe-event-schedule-details">
				<img class="icon" src="<?php echo(get_bloginfo("template_url")); ?>/images/icon-gray-calendar.svg">
				<?php echo(tribe_get_start_date(null, false, "F j, Y")); ?>
			</div>

			<?php if ( $venue_details ) : ?>
				<!-- Venue Display Info -->
				<div class="tribe-events-venue-details">
					<img class="icon" src="<?php echo(get_bloginfo("template_url")); ?>/images/icon-gray-pin.svg">
					<?php
						$address_delimiter = empty( $venue_address ) ? ' ' : ', ';

						// These details are already escaped in various ways earlier in the process.
						
						if ($address_delimiter != "") {
							$address_delimiter = substr($address_delimiter, 0, -2);
						}
						
						echo implode( $address_delimiter, $venue_details );

						if ( tribe_show_google_map_link() ) {
							echo tribe_get_map_link_html();
						}
					?>
				</div> <!-- .tribe-events-venue-details -->
			<?php endif; ?>

		</div>
	</div><!-- .tribe-events-event-meta -->

	<?php
	do_action( 'tribe_events_after_the_content' );
	?>
	<div class="buttonset bottom-buttonset">
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="button blue tribe-events-read-more" rel="">MORE INFO</a>

		<?php
		if ($buy_tickets_link) {
			echo("<a href=\"".$buy_tickets_link."\" class=\"button bluereverse\" target=\"_blank\">Buy Tickets</a>");
		}?>
	</div>
</div>

