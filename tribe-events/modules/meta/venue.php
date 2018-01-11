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
	<div class="column-text">
		<h3 > Address </h3>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
		<div>
			<div>
				<b><?php echo tribe_get_venue() ?></b>
			</div>
			<?php if ( tribe_address_exists() ) : ?>
				<div>
					<address class="tribe-events-address">
						<?php echo tribe_get_full_address(); ?>

						<?php if ( tribe_show_google_map_link() ) : ?>
							<?php echo tribe_get_map_link_html(); ?>
						<?php endif; ?>
					</address>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $phone ) ): ?>
				<div>
					<?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?>
					<?php echo $phone ?>
				</div>
			<?php endif ?>

			<?php if ( ! empty( $website ) ): ?>
				<div>
					<?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> 
					<?php echo $website ?>
				</div>
			<?php endif ?>
		</div>
		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</div>
</div>