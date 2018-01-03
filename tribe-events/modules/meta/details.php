<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *

	BEN: I repurposed this to only show the event's "admission_types"


 * @package TribeEventsCalendar
 */

$event_id = Tribe__Main::post_id_helper();
$admission_types = get_field("admission_types", $event_id);

?>

<div>
	<img class="icon" src="http://gar.oldstlouis.com/wp-content/themes/gateway-arch/images/icon-buy-tickets.svg">
	<div class="column-text">
		<h3>Admission</h3>
		<div>
		
			<?php	
				if ($admission_types) {
					foreach($admission_types as $type) {
						$label = $type["admission_type"];
						$price = $type["admission_price"];

						echo("<div>");
						//if not free
						if($price > 0){
							echo($label.": $".number_format($price,2)."<br />");
						}else{
							echo("Free Admission!");
						}
						echo("</div>");
					}
				}else{

					echo("<div>");
						echo("Free Admission!");
					echo("</div>");
				}

				if ($admission_footer_html) {
					echo($admission_footer_html);
				}
			?>

		</div>
	</div>
</div>

