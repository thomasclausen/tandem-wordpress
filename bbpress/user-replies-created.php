<?php
/*
 * bbPress - User Replies Created
 */
?>

<?php do_action( 'bbp_template_before_user_replies' ); ?>
<?php if ( bbp_get_user_replies_created() ) : ?>
	<?php bbp_get_template_part( 'loop', 'replies' ); ?>
	<?php bbp_get_template_part( 'pagination', 'replies' ); ?>
<?php else : ?>
	<ul class="bbp-forums bbp-template-notice">
		<li class="bbp-body">
			<p><?php bbp_is_user_home() ? _e( 'You have not replied to any topics.', 'bbpress' ) : _e( 'This user has not replied to any topics.', 'bbpress' ); ?></p>
		</li>
	</ul>
<?php endif; ?>
<?php do_action( 'bbp_template_after_user_replies' ); ?>