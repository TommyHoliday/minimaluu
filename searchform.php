<?php
/**
 * Template for displaying the standard search forms
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="text" class="field" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'minimaluu' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'minimaluu' ); ?>" />
</form>