<?php
/*
 * bbPress - User Logged In
 */
?>

<div class="bbp-logged-in">
	<a href="<?php bbp_user_profile_url( bbp_get_current_user_id() ); ?>" class="submit user-submit"><?php echo get_avatar( bbp_get_current_user_id(), '40' ); ?></a>
	<h4><?php bbp_user_profile_link( bbp_get_current_user_id() ); ?></h4>
	<?php bbp_logout_link(); ?>
</div>