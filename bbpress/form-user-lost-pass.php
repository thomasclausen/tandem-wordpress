<?php

/**
 * User Lost Password Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
	<fieldset>
		<div class="bbp-username">
			<label for="user_login" class="hide"><?php _e( 'Brugernavn eller e-mail', 'tandem' ); ?>:</label>
			<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" />
		</div>
		<div class="bbp-submit-wrapper">
			<?php do_action( 'login_form', 'resetpass' ); ?>
			<button type="submit" name="user-submit" id="user-submit" class="button submit user-submit" tabindex="<?php bbp_tab_index(); ?>"><?php _e( 'F&aring; nyt kodeord', 'tandem' ); ?></button>
			<?php bbp_user_lost_pass_fields(); ?>
		</div>
	</fieldset>
</form>