<?php
/*
 * bbPress - User Topics Created
 */
?>

<?php do_action( 'bbp_template_before_user_topics_created' ); ?>
<?php if ( bbp_get_user_topics_started() ) : ?>
	<?php bbp_get_template_part( 'loop', 'topics' ); ?>
	<?php bbp_get_template_part( 'pagination', 'topics' ); ?>
<?php else : ?>
	<ul class="bbp-forums bbp-template-notice">
		<li class="bbp-body">
			<p><?php bbp_is_user_home() ? _e( 'You have not created any topics.', 'bbpress' ) : _e( 'This user has not created any topics.', 'bbpress' ); ?></p>
		</li>
	</ul>
<?php endif; ?>
<?php do_action( 'bbp_template_after_user_topics_created' ); ?>