<?php
/**
 * Displays progressbar
 *
 * @package Magze
 */

$progressbar_position = get_theme_mod( 'progressbar_position', 'top' );
?>
<div id="magze-progress-bar" class="<?php echo esc_attr( $progressbar_position ); ?>"></div>