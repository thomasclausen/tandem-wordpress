<?php
/*
 * bbPress - Forum Archive
 */
?>

<?php $tandem_post_type = get_post_type(); ?>

<?php get_header( $tandem_post_type ); ?>

<?php get_sidebar( $tandem_post_type ); ?>

	<section id="content" class="clearfix">
		<?php get_search_form(); ?>

		<?php do_action( 'bbp_before_main_content' ); ?>
		<div class="bbpress-header clearfix">
			<?php do_action( 'bbp_template_notices' ); ?>
		</div>
		<div id="bbpress-forums">
			<?php do_action( 'bbp_template_before_forums_index' ); ?>
			<?php if ( bbp_has_forums() ) : ?>
				<?php bbp_get_template_part( 'loop', 'forums' ); ?>
			<?php else : ?>
				<ul class="bbp-forums bbp-template-notice">
					<li class="bbp-body">
						<p><?php _e( 'Oh bother! No forums were found here!', 'bbpress' ); ?></p>
					</li>
				</ul>
			<?php endif; ?>
			<?php do_action( 'bbp_template_after_forums_index' ); ?>
		</div>
		<?php do_action( 'bbp_after_main_content' ); ?>
	</section>

<?php get_footer( $tandem_post_type ); ?>