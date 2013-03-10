<?php

/**
 * User Favorites
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_user_favorites' ); ?>
	<?php if ( bbp_get_user_favorites() ) : ?>
		<?php bbp_get_template_part( 'loop', 'topics' ); ?>
		<?php bbp_get_template_part( 'pagination', 'topics' ); ?>
	<?php else : ?>
		<ul class="bbp-forums bbp-template-notice">
			<li class="bbp-body">
				<p><?php bbp_is_user_home() ? _e( 'You currently have no favorite topics.', 'bbpress' ) : _e( 'This user has no favorite topics.', 'bbpress' ); ?></p>
			</li>
		</ul>
	<?php endif; ?>
<?php do_action( 'bbp_template_after_user_favorites' ); ?>