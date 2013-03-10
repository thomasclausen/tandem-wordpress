<?php

/**
 * User Registration Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
	<fieldset>
		<div class="bbp-username">
			<label for="user_login"><?php _e( 'Brugernavn', 'tandem' ); ?>:</label>
			<input type="text" name="user_login" value="<?php bbp_sanitize_val( 'user_login' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" />
			<p><?php _e( 'Dit brugernavn skal v&aelig;re mindst 4 tegn og kun bogstaver og tal.', 'tandem' ) ?></p>
		</div>
		<div class="bbp-email">
			<label for="user_email"><?php _e( 'E-mail', 'tandem' ); ?>: </label>
			<input type="text" name="user_email" value="<?php bbp_sanitize_val( 'user_email' ); ?>" size="20" id="user_email" tabindex="<?php bbp_tab_index(); ?>" />
			<p><?php _e( 'Vi bruger din e-mail adresse til at sende dig et kodeord og bekr&aelig;fte din profil.', 'tandem' ) ?>.</p>
		</div>
		<?php do_action( 'register_form' ); ?>
		<div class="bbp-submit-wrapper">
			<button type="submit" name="user-submit" id="user-submit" class="button submit user-submit" tabindex="<?php bbp_tab_index(); ?>"><?php _e( 'Opret bruger', 'tandem' ); ?></button>
			<?php bbp_user_register_fields(); ?>
		</div>
	</fieldset>
</form>