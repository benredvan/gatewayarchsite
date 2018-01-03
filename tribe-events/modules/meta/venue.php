<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div >
	<img class="icon" src="http://gar.oldstlouis.com/wp-content/themes/gateway-arch/images/icon-map-pin.svg">
	<div class="column_text">
		<h3 > Address </h3>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
		<div>
			<?php echo tribe_get_venue() ?><br />

			<?php if ( tribe_address_exists() ) : ?>
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>
						<?php echo tribe_get_map_link_html(); ?>
					<?php endif; ?>
				</address>
			<?php endif; ?>

			<?php if ( ! empty( $phone ) ): ?>
				<?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?>
				<?php echo $phone ?> <br />
			<?php endif ?>

			<?php if ( ! empty( $website ) ): ?>
				<?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> 
				<?php echo $website ?> <br />
			<?php endif ?>
		</div>
		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</div>
</div>